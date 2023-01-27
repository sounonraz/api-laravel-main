<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/***
 * Class FormulaireNotation
 * @package App\Models
 */
class FormulaireNotation extends Model {

    protected $table = "formulaire_notation";

    /**
     * @var string[]
     */
    protected $fillable = [
        'classe_id', 'matiere_id', 'enseignant_id',
        'code',
    ];

    protected $appends = ["classe", "matiere", "enseignant"];

    public static function getRules(): array {
        return [
            'classe_id' => 'required|exists:classe,id',
            'matiere_id' => 'required|exists:matiere,id',
            'enseignant_id' => 'required|exists:enseignant,id',
        ];
    }

    public function classe() {
        return $this->belongsTo(Classe::class, 'classe_id', 'id');
    }

    public function matiere() {
        return $this->belongsTo(Matiere::class, 'matiere_id', 'id');
    }

    public function enseignant() {
        return $this->belongsTo(Enseignant::class, 'enseignant_id', 'id');
    }

    public function notations() {
        return $this->hasMany(Notation::class, "formulaire_notation_id","id");
    }

    public function getEnseignantAttribute() {
        return $this->enseignant()->first();
    }
    public function getMatiereAttribute() {
        return $this->matiere()->first();
    }
    public function getClasseAttribute() {
        return $this->classe()->first();
    }
}
