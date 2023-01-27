<?php

namespace App\Swaager\Enseignant;

/**
 * @OA\Schema(
 *      title="Save Enseignant Request",
 *      type="object",
 *      required={"nom", "prenoms"}
 * )
 */
class EnseignantRequest {


    /**
     * @OA\Property(
     *      title="nom",
     *      description="nom of the Enseignant",
     *      example="ADOZEKPA"
     * )
     *
     * @var string
     */
    public $nom;

    /**
     * @OA\Property(
     *      title="prenoms",
     *      description="prenoms of the Enseignant",
     *      example="Romaric"
     * )
     *
     * @var string
     */
    public $prenoms;
}
