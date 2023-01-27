<?php

namespace App\Swaager\Authentification;

/**
 * @OA\Schema(
 *     title="Logout Response",
 *     @OA\Xml(
 *         name="LogoutResource"
 *     )
 * )
 */
class LogoutResponse {

    /**
     * @OA\Property(
     *     title="message",
     * )
     *
     * @var string
     */
    private $message;
}
