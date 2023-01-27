<?php

namespace App\Swaager\Notation;

/**
 * @OA\Schema(
 *     title="List notation Response",
 *     @OA\Xml(
 *         name="ListNotationResponse"
 *     )
 * )
 */
class ListNotationResponse {


    /**
     * @OA\Property(
     *     title="niveau",
     *     @OA\Items(ref="#/components/schemas/NotationModel")
     * )
     *
     * @var array
     */
    private $notations;

    /**
     * @OA\Property(
     *     title="message",
     * )
     *
     * @var string
     */
    private $message;
}
