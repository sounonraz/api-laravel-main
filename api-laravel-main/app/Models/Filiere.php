<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class AnnneeAcademique
 * @package App\Models
 */
class Filiere extends Model {

    protected $table = "filiere";

    /**
     * @var string[]
     */
    protected $fillable = [
        'libelle', 'code',
    ];


    /**
     * @param null $id
     * @return string[]
     */
    public static function getRules($id = null): array {
        $requirementLibelle = 'required|unique:filiere,libelle';
        $requirementCode = 'required|unique:filiere,code';
        if($id != null) {
            return [
                'libelle' => $requirementLibelle.','. $id,
                'code' => $requirementCode.','. $id
            ];
        } else {
            return [
                'libelle' => $requirementLibelle,
                'code' => $requirementCode
            ];
        }
    }
}
