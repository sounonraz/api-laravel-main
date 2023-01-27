<?php

namespace App\Swaager\Classe;

use App\Swaager\AnneeAcademique\AnneeAcademiqueModel;
use App\Swaager\Filiere\FiliereModel;
use App\Swaager\Niveau\NiveauModel;

/**
 * @OA\Schema(
 *     title="Classe Model",
 *     @OA\Xml(
 *         name="Classe"
 *     )
 * )
 */
class ClasseModel {


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
     * @var FiliereModel
     */
    public $filiere;


    /**
     * @OA\Property(
     *      title="niveau",
     *      description="niveau of Classe",
     * )
     *
     * @var NiveauModel
     */
    public $niveau;

    /**
     * @OA\Property(
     *      title="anneeAcademique",
     *      description="anneeAcademique of Classe",
     * )
     *
     * @var AnneeAcademiqueModel
     */
    public $anneeAcademique;

}
