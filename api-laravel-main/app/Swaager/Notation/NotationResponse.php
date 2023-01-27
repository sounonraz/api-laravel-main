<?php

namespace App\Swaager\Notation;

/**
 * @OA\Schema(
 *     title="Notation Response",
 *     @OA\Xml(
 *         name="NotationResponse"
 *     )
 * )
 */
class NotationResponse {


    /**
     * @OA\Property(
     *     title="notation",
     * )
     *
     * @var NotationModel
     */
    private $notation;

    /**
     * @OA\Property(
     *     title="message",
     * )
     *
     * @var string
     */
    private $message;
}
