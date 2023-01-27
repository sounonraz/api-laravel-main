<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class LigneReponse
 * @package App\Models
 */
class LigneNotation extends Model {

    protected $table = "ligne_notation";

    protected $appends = ["critere"];

    /**
     * @var string[]
     */
    protected $fillable = [
        'notation_id', 'critere_notation_id', 'reponse'
    ];

    public function critere() {
        return $this->belongsTo(CritereNotation::class, "critere_notation_id", "id");
    }

    public function getCritereAttribute() {
        return $this->critere()->first();
    }
}
