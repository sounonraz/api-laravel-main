<?php
namespace App\Services;

use App\Models\Enseignant;

/**
 * Class EnseignantService
 * @package App\Services
 */
class EnseignantService {

    /**
     * @param $nom
     * @param $prenoms
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function getEnseinantByNameAndPrenoms($nom, $prenoms) {
        return Enseignant::query()
            ->where('nom', '=', $nom)
            ->where('prenoms', '=', $prenoms);
    }
}
