<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Enseignant
 * @package App\Models
 */
class Enseignant extends Model {

    protected $table = "enseignant";

    /**
     * @var string[]
     */
    protected $fillable = [
        'nom', 'prenoms'
    ];

    /**
     * @param null $id
     * @return string[]
     */
    public static function getRules(): array {
        return [
            'nom' => 'required',
            'prenoms' => 'required'
        ];
    }

}
