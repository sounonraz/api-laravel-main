<?php

namespace App\Swaager\Credentials;

/**
 * @OA\Schema(
 *      title="Generate credentials Request",
 *      type="object",
 *      required={"classe_id", "effectif"}
 * )
 */
class CredentialRequest {


    /**
     * @OA\Property(
     *      title="classe_id",
     *      description="Classe id",
     *      example="2"
     * )
     *
     * @var integer
     */
    public $classe_id;


    /**
     * @OA\Property(
     *      title="effectif",
     *      description="Effectif of the classe",
     *      example="57"
     * )
     *
     * @var integer
     */
    public $effectif;
}
