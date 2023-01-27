<?php

namespace App\Swaager\Credentials;

/**
 * @OA\Schema(
 *     title="Credential Response",
 *     @OA\Xml(
 *         name="CredentialsResource"
 *     )
 * )
 */
class CredentialResponse {


    /**
     * @OA\Property(
     *     title="users",
     * )
     *
     * @var CredentialModel
     */
    private $users;


    /**
     * @OA\Property(
     *     title="message",
     * )
     *
     * @var string
     */
    private $message;
}
