<?php

namespace App\Swaager\Niveau;

/**
 * @OA\Schema(
 *     title="Niveau Response",
 *     @OA\Xml(
 *         name="NiveauResponse"
 *     )
 * )
 */
class NiveauResponse {


    /**
     * @OA\Property(
     *     title="niveau",
     * )
     *
     * @var CredentialModel
     */
    private $niveau;

    /**
     * @OA\Property(
     *     title="message",
     * )
     *
     * @var string
     */
    private $message;
}
