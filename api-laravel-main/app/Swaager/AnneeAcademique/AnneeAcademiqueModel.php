<?php

namespace App\Swaager\AnneeAcademique;

/**
 * @OA\Schema(
 *     title="AnneeAcademique Model",
 *     @OA\Xml(
 *         name="AnneeAcademique"
 *     )
 * )
 */
class AnneeAcademiqueModel {


    /**
     * @OA\Property(
     *     title="id",
     *     description="Identifier",
     *     format="int64",
     *     example=18
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="libelle",
     *      description="libelle of AnneeAcademique",
     *      example="2020-2021"
     * )
     *
     * @var string
     */
    public $libelle;
}
