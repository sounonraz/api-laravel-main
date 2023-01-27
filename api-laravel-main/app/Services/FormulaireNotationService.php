<?php
namespace App\Services;


use App\Models\FormulaireNotation;
use App\Models\Matiere;
use Illuminate\Support\Str;

/***
 * Class NotationService
 * @package App\Services
 */
class FormulaireNotationService {


    private static $CODE_SALT_VALUE = "IFRI@NOTATION";
    private static $NB_CHAR_SGMENTATION = 3;

    public static $MESSAGE_USER_HAS_ALREADY_ANSWERED = "HAS_ALREADY_ANSWERED";

    /**
     * @param $classe_id
     * @param $matiere_id
     * @param $enseignant_id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function getNotationByClasseAndMatiereAndEnseignant($classe_id, $matiere_id, $enseignant_id) {
        return FormulaireNotation::query()
            ->where('classe_id', '=', $classe_id)
            ->where('matiere_id', '=', $matiere_id)
            ->where('enseignant_id', '=', $enseignant_id);
    }

    /**
     *
     * @param $classe_id
     * @param $matiere_id
     * @param $enseignant_id
     * @return string
     */
    public static function generateNewCodeNotation($classe_id, $matiere_id, $enseignant_id): string {
        $data = (string) Str::uuid();
        $matiere = Matiere::query()->where('id', '=', $matiere_id)->first();
        $data = Str::slug($matiere->libelle)."-$classe_id$matiere_id$enseignant_id";
        return $data;
    }
}
