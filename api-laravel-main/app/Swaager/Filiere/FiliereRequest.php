<?php

namespace App\Swaager\Filiere;

/**
 * @OA\Schema(
 *      title="Save Filiere Request",
 *      type="object",
 *      required={"libelle", "code"}
 * )
 */
class FiliereRequest {


    /**
     * @OA\Property(
     *      title="libelle",
     *      description="libelle of the Filiere",
     *      example="Génie Logiciel"
     * )
     *
     * @var string
     */
    public $libelle;

    /**
     * @OA\Property(
     *      title="code",
     *      description="code of the Filiere",
     *      example="GL"
     * )
     *
     * @var string
     */
    public $code;
}
