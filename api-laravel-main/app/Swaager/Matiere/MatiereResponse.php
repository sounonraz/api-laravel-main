<?php

namespace App\Swaager\Matiere;

/**
 * @OA\Schema(
 *     title="Matiere Response",
 *     @OA\Xml(
 *         name="MatiereResponse"
 *     )
 * )
 */
class MatiereResponse {


    /**
     * @OA\Property(
     *     title="matiere",
     * )
     *
     * @var MatiereModel
     */
    private $matiere;

    /**
     * @OA\Property(
     *     title="message",
     * )
     *
     * @var string
     */
    private $message;
}
