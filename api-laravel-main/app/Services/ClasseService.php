<?php
namespace App\Services;

use App\Models\Classe;

/**
 * Class ClasseService
 * @package App\Services
 */
class ClasseService {


    /**
     * @param $niveauId
     * @param $anneeAcademiqueId
     * @param $filiereId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function getClasseByNiveauIdAndAnneeAndFiliere($niveauId, $anneeAcademiqueId, $filiereId) {
        return Classe::query()
            ->where('filiere_id', '=', $filiereId)
            ->where('annee_academique_id', '=', $anneeAcademiqueId)
            ->where('niveau_id', '=', $niveauId);
    }
}
