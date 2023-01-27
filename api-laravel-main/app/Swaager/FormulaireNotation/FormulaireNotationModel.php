<?php

namespace App\Swaager\FormulaireNotation;

use App\Swaager\Classe\ClasseModel;
use App\Swaager\Enseignant\EnseignantModel;
use App\Swaager\Matiere\MatiereModel;

/**
 * @OA\Schema(
 *     title="FormulaireNotation Model",
 *     @OA\Xml(
 *         name="FormulaireNotation"
 *     )
 * )
 */
class FormulaireNotationModel {


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
     *      title="code",
     *      description="code of Notation",
     *      example="klmd-huib-sqwg-sgvx-kddu"
     * )
     *
     * @var string
     */
    public $code;

    /**
     * @OA\Property(
     *      title="classe",
     *      description="classe of Notation",
     * )
     *
     * @var ClasseModel
     */
    public $classe;

    /**
     * @OA\Property(
     *      title="matiere",
     *      description="classe of Notation",
     * )
     *
     * @var MatiereModel
     */
    public $matiere;

    /**
     * @OA\Property(
     *      title="enseignant",
     *      description="enseignant of Notation",
     * )
     *
     * @var EnseignantModel
     */
    public $enseignant;
}
