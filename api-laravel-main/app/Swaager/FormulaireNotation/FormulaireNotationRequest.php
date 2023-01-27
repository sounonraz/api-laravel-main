<?php

namespace App\Swaager\FormulaireNotation;

/**
 * @OA\Schema(
 *      title="Save FormulaireNotation Request",
 *      type="object",
 *      required={"classe_id", "matiere_id","enseignant_id"}
 * )
 */
class FormulaireNotationRequest {


    /**
     * @OA\Property(
     *      title="classe_id",
     *      description="classe_id of the Notation",
     *      example="19"
     * )
     *
     * @var integer
     */
    public $classe_id;

    /**
     * @OA\Property(
     *      title="matiere_id",
     *      description="matiere_id of the Notation",
     *      example="6"
     * )
     *
     * @var integer
     */
    public $matiere_id;


    /**
     * @OA\Property(
     *      title="enseignant_id",
     *      description="enseignant_id of the Notation",
     *      example="4"
     * )
     *
     * @var integer
     */
    public $enseignant_id;
}
