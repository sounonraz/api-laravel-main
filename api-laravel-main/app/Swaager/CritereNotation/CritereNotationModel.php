<?php

namespace App\Swaager\CritereNotation;

/**
 * @OA\Schema(
 *     title="CritereNotation Model",
 *     @OA\Xml(
 *         name="CritereNotation"
 *     )
 * )
 */
class CritereNotationModel {


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
     *      description="libelle of CritereNotation",
     *      example="Le cours est-il vivant ?"
     * )
     *
     * @var string
     */
    public $libelle;

    /**
     * @OA\Property(
     *      title="type",
     *      description="type of CritereNotation",
     *      example="SELECT ou TEXTAREA"
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *      title="values",
     *      description="values of CritereNotation",
     *      example="Mauvais#Passable#Bien#Très bien#Excellent"
     * )
     *
     * @var string
     */
    public $values;

    /**
     * @OA\Property(
     *      title="values",
     *      description="poids of CritereNotation",
     *      example="7"
     * )
     *
     * @var integer
     */
    public $poids;
}
