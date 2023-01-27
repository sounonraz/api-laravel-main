<?php

namespace App\Swaager\Enseignant;

/**
 * @OA\Schema(
 *     title="Enseignant Model",
 *     @OA\Xml(
 *         name="Enseignant"
 *     )
 * )
 */
class EnseignantModel {


    /**
     * @OA\Property(
     *     title="id",
     *     description="Identifier",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="nom",
     *      description="nom of Enseignant",
     *      example="HOUNDJI"
     * )
     *
     * @var string
     */
    public $nom;

    /**
     * @OA\Property(
     *      title="prenoms",
     *      description="prenoms of Enseignant",
     *      example="Ratheil V."
     * )
     *
     * @var string
     */
    public $prenoms;
}
