<?php

namespace App\Swaager\Niveau;

/**
 * @OA\Schema(
 *     title="Niveau Model",
 *     @OA\Xml(
 *         name="Niveau"
 *     )
 * )
 */
class NiveauModel {


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
     *      title="libelle",
     *      description="libelle of niveau",
     *      example="L3"
     * )
     *
     * @var string
     */
    public $libelle;
}
