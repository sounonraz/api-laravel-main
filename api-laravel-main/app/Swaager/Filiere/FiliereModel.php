<?php

namespace App\Swaager\Filiere;

/**
 * @OA\Schema(
 *     title="Filiere Model",
 *     @OA\Xml(
 *         name="Filiere"
 *     )
 * )
 */
class FiliereModel {


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
     *      description="libelle of Filiere",
     *      example="Génie Logiciel"
     * )
     *
     * @var string
     */
    public $libelle;

    /**
     * @OA\Property(
     *      title="code",
     *      description="code of Filiere",
     *      example="GL"
     * )
     *
     * @var string
     */
    public $code;
}
