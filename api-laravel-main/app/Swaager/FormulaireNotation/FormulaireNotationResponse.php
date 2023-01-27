<?php

namespace App\Swaager\FormulaireNotation;

/**
 * @OA\Schema(
 *     title="FormulaireNotation Response",
 *     @OA\Xml(
 *         name="FormulaireNotationResponse"
 *     )
 * )
 */
class FormulaireNotationResponse {


    /**
     * @OA\Property(
     *     title="formulaireNotation",
     * )
     *
     * @var FormulaireNotationModel
     */
    private $formulaireNotation;

    /**
     * @OA\Property(
     *     title="message",
     * )
     *
     * @var string
     */
    private $message;
}
