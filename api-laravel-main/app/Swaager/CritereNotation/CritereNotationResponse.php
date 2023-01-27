<?php

namespace App\Swaager\CritereNotation;

/**
 * @OA\Schema(
 *     title="CritereNotation Response",
 *     @OA\Xml(
 *         name="CritereNotation"
 *     )
 * )
 */
class CritereNotationResponse {


    /**
     * @OA\Property(
     *     title="critereNotation",
     * )
     *
     * @var CritereNotationModel
     */
    private $critereNotation;

    /**
     * @OA\Property(
     *     title="message",
     * )
     *
     * @var string
     */
    private $message;
}
