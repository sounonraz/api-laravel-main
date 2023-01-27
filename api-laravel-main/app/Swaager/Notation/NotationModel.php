<?php

namespace App\Swaager\Notation;

use App\Swaager\FormulaireNotation\FormulaireNotationModel;

/**
 * @OA\Schema(
 *     title="Notation Model",
 *     @OA\Xml(
 *         name="Notation"
 *     )
 * )
 */
class NotationModel {


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
     *      title="lignes",
     *      description="lignes of Notation",
     *      type="array",
     *      @OA\Items(ref="#/components/schemas/LigneNotationModel")
     * )
     *
     * @var array
     */
    public $lignes;


    /**
     * @OA\Property(
     *      title="lignes",
     *      description="lignes of Notation",
     * )
     *
     * @var FormulaireNotationModel
     */
    public $formulaire_notation;

}
