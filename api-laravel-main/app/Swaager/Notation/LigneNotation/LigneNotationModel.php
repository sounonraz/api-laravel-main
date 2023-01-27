<?php

namespace App\Swaager\Notation\LigneNotation;

use App\Swaager\CritereNotation\CritereNotationModel;

/**
 * @OA\Schema(
 *     title="LigneNotation Model",
 *     @OA\Xml(
 *         name="LigneNotation"
 *     )
 * )
 */
class LigneNotationModel {


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
     *      title="critere",
     * )
     *
     * @var CritereNotationModel
     */
    public $critere;

    /**
     * @OA\Property(
     *      title="reponse",
     * )
     *
     * @var string
     */
    public $reponse;
}
