<?php

namespace App\Swaager\Matiere;

/**
 * @OA\Schema(
 *     title="Matiere Model",
 *     @OA\Xml(
 *         name="Matiere"
 *     )
 * )
 */
class MatiereModel {


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
     *      description="libelle of Matiere",
     *      example="Recherche Opérationnelle"
     * )
     *
     * @var string
     */
    public $libelle;

    /**
     * @OA\Property(
     *      title="code",
     *      description="code of Matiere",
     *      example="RO"
     * )
     *
     * @var string
     */
    public $code;
}
