<?php

namespace App\Swaager\Filiere;

/**
 * @OA\Schema(
 *     title="Niveau Response",
 *     @OA\Xml(
 *         name="NiveauResponse"
 *     )
 * )
 */
class FiliereResponse {


    /**
     * @OA\Property(
     *     title="filiere",
     * )
     *
     * @var MatiereModel
     */
    private $filiere;

    /**
     * @OA\Property(
     *     title="message",
     * )
     *
     * @var string
     */
    private $message;
}
