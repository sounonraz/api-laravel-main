<?php

namespace App\Swaager\Classe;

/**
 * @OA\Schema(
 *      title="Save Classe Request",
 *      type="object",
 *      required={"niveau_id", "filiere_id", "annee_academique_id"}
 * )
 */
class ClasseRequest {


    /**
     * @OA\Property(
     *      title="niveau_id",
     *      description="niveau_id of the classe",
     *      example="2"
     * )
     *
     * @var integer
     */
    public $niveau_id;

    /**
     * @OA\Property(
     *      title="filiere_id",
     *      description="filiere_id of the classe",
     *      example="8"
     * )
     *
     * @var integer
     */
    public $filiere_id;

    /**
     * @OA\Property(
     *      title="annee_academique_id",
     *      description="annee_academique_id of the classe",
     *      example="8"
     * )
     *
     * @var integer
     */
    public $annee_academique_id;
}
