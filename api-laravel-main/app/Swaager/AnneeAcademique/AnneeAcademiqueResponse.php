<?php

namespace App\Swaager\AnneeAcademique;

/**
 * @OA\Schema(
 *     title="AnneeAcademique Response",
 *     @OA\Xml(
 *         name="AnneeAcademiqueResponse"
 *     )
 * )
 */
class AnneeAcademiqueResponse {


    /**
     * @OA\Property(
     *     title="anneeAcademique",
     * )
     *
     * @var AnneeAcademiqueModel
     */
    private $anneeAcademique;

    /**
     * @OA\Property(
     *     title="message",
     * )
     *
     * @var string
     */
    private $message;
}
