<?php

namespace App\Swaager\Enseignant;

/**
 * @OA\Schema(
 *     title="Enseignant Response",
 *     @OA\Xml(
 *         name="EnseignantResponse"
 *     )
 * )
 */
class EnseignantResponse {


    /**
     * @OA\Property(
     *     title="enseignant",
     * )
     *
     * @var EnseignantModel
     */
    private $enseignant;

    /**
     * @OA\Property(
     *     title="message",
     * )
     *
     * @var string
     */
    private $message;
}
