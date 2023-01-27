<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Faker\Factory;

/**
 * Class UserService
 * @package App\Services
 */
class UserService {


    private static $EMAIL_DOMAIL = "ifri-notation.com";
    private static $MIN_LENGH_PASSWORD = 8;
    private static $MAX_LENGH_PASSWORD = 8;

    public static $USER_STATUS_ACTIF = "ACTIF";
    public static $USER_STATUS_INACTIF = "INACTIF";

    /**
     * @param $email
     * @return User
     */
    public static function loadUserByEmail($email): Model {
        return User::query()->
            where('email', '=', $email)
            ->first();
    }

    /**
     * @param $index
     * @param $classe_id
     * @return array
     */
    public static function generateCredentials($index, $classe_id) {
        $factory = Factory::create("en_US");
        $email = preg_replace('/@example\..*/', '@'.static::$EMAIL_DOMAIL, $factory->unique()->safeEmail);
        Log::debug($email);
        return [
            'email' => $email,
            'plain_password' => $factory->unique()->password(
                self::$MIN_LENGH_PASSWORD,
                self::$MAX_LENGH_PASSWORD
            )
        ];
    }

    /**
     * @param $email
     * @param $plain_password
     * @return \Illuminate\Database\Eloquent\Builder|Model
     */
    public static function saveCredential($email, $plain_password, $classe_id) {
        return User::query()->create([
            'email' => $email,
            'password' => Hash::make($plain_password),
            'role' => RoleService::$ROLE_ETUDIANT,
            'classe_id' => $classe_id,
            'qrcode' => self::generateQrCodeValue($email, $classe_id)
        ]);
    }

    /**
     * @param $classe_id
     */
    public static function deleteOldCredentialsForClasse($classe_id) {
        User::query()->where([
            'role' => RoleService::$ROLE_ETUDIANT,
            'classe_id' => $classe_id,
        ])->update([
            'status' => self::$USER_STATUS_INACTIF
        ]);
    }

    /**
     * @param $email
     * @param $classe_id
     * @return string
     */
    public static function generateQrCodeValue($email, $classe_id): string {
        return Hash::make($email.":@".$classe_id.":@".(new Carbon())->milliseconds);
    }

    /***
     * @param $classe_id
     * @return bool
     */
    public static function hasAlreadyGeneratedCredentials($classe_id) {
        return User::query()
            ->where('classe_id', '=', $classe_id)
            ->count();
    }

    /**
     * @param $qrCode
     * @return \Illuminate\Database\Eloquent\Builder|Model|object|null
     */
    public static function getUserAnonymousByQrCode($qrCode) {
        return User::query()
            ->where('role', '=', RoleService::$ROLE_ETUDIANT)
            ->where('qrcode', '=', $qrCode)
            ->where('status', '=', self::$USER_STATUS_ACTIF)
            ->first();
    }

    /**
     * @return string[]
     */
    public static function getUserStatus() {
        return [
            self::$USER_STATUS_ACTIF => "Actif",
            self::$USER_STATUS_INACTIF => "Inactif"
        ];
    }
}
