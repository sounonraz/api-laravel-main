<?php

namespace App\Swaager\CritereNotation;

/**
 * @OA\Schema(
 *      title="Save CritereNotation Request",
 *      type="object",
 *      required={"libelle", "type", "poids"}
 * )
 */
class CritereNotationRequest {


    /**
     * @OA\Property(
     *      title="libelle",
     *      description="libelle of the CritereNotation",
     *      example="Le cours est comment général ?"
     * )
     *
     * @var string
     */
    public $libelle;

    /**
     * @OA\Property(
     *      title="poids",
     *      description="poids of the CritereNotation",
     *      example="11"
     * )
     *
     * @var string
     */
    public $poids;

    /**
     * @OA\Property(
     *      title="type",
     *      description="type of the CritereNotation",
     *      example="TEXTAREA"
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *      title="values",
     *      description="values of the CritereNotation",
     *      example=""
     * )
     *
     * @var string
     */
    public $values;
}
