<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Classe
 * @package App\Models
 */
class Classe extends Model {

    protected $table = "classe";

    protected $appends = ["niveau", "filiere", "annee_academique"];

    /**
     * @var string[]
     */
    protected $fillable = [
        'niveau_id', 'filiere_id', 'annee_academique_id'
    ];


    /**
     * @param null $id
     * @return string[]
     */
    public static function getRules(): array {
        return [
            'niveau_id' => 'required|exists:niveau,id',
            'filiere_id' => 'required|exists:filiere,id',
            'annee_academique_id' => 'required|exists:annee_academique,id',
        ];
    }

    public function niveau(){
        return $this->belongsTo(Niveau::class, "niveau_id", "id");
    }

    public function filiere(){
        return $this->belongsTo(Filiere::class, "filiere_id", "id");
    }

    public function annee_academique() {
        return $this->belongsTo(AnnneeAcademique::class, "annee_academique_id", "id");
    }

    public function getAnneeAcademiqueAttribute(){
        return $this->annee_academique()->first();
    }

    public function getFiliereAttribute(){
        return $this->filiere()->first();
    }

    public function getNiveauAttribute(){
        return $this->niveau()->first();
    }
}
