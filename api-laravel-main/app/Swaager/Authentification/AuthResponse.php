<?php

namespace App\Swaager\Authentification;

/**
 * @OA\Schema(
 *     title="Auth Response",
 *     @OA\Xml(
 *         name="AuthResource"
 *     )
 * )
 */
class AuthResponse {


    /**
     * @OA\Property(
     *     title="authentification",
     * )
     *
     * @var CredentialModel
     */
    private $user;

    /**
     * @OA\Property(
     *     title="access_token",
     * )
     *
     * @var string
     */
    private $access_token;

    /**
     * @OA\Property(
     *     title="message",
     * )
     *
     * @var string
     */
    private $message;
}
