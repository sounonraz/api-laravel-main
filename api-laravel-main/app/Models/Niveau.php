<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Niveau
 * @package App\Models
 */
class Niveau extends Model {

    protected $table = "niveau";

    /**
     * @var string[]
     */
    protected $fillable = [
        'libelle',
    ];

    /**
     * @param null $id
     * @return string[]
     */
    public static function getRules($id = null): array {
        $requirement = 'required|unique:niveau,libelle';
        if($id != null) {
            return [
                'libelle' => $requirement.','. $id
            ];
        } else {
            return [
                'libelle' => $requirement
            ];
        }
    }
}
