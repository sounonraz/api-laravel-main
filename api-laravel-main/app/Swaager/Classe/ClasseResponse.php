<?php

namespace App\Swaager\Classe;

/**
 * @OA\Schema(
 *     title="Classe Response",
 *     @OA\Xml(
 *         name="ClasseResponse"
 *     )
 * )
 */
class ClasseResponse {


    /**
     * @OA\Property(
     *     title="classe",
     * )
     *
     * @var ClasseModel
     */
    private $classe;

    /**
     * @OA\Property(
     *     title="message",
     * )
     *
     * @var string
     */
    private $message;
}
