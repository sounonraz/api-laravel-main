<?php

namespace App\Swaager\Niveau;

/**
 * @OA\Schema(
 *      title="Save Niveau Request",
 *      type="object",
 *      required={"libelle"}
 * )
 */
class NiveauRequest {


    /**
     * @OA\Property(
     *      title="libelle",
     *      description="Libelle of the niveau",
     *      example="M3"
     * )
     *
     * @var string
     */
    public $libelle;
}
