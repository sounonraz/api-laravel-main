<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Notation
 * @package App\Models
 */
class Notation extends Model {

    protected $table = "notation";

    protected $appends = ["lignes",];

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_id', "formulaire_notation_id"
    ];

    public function lignes() {
        return $this->hasMany(LigneNotation::class, "notation_id", "id");
    }

    public function formulaireNotation() {
        return $this->belongsTo(FormulaireNotation::class, "formulaire_notation_id", "id");
    }

    public function getLignesAttribute() {
        return $this->lignes()
            ->orderBy('critere_notation_id')
            ->get();
    }

    public function getFormulaireNotationAttribute() {
        return $this->formulaireNotation()->first();
    }
}
