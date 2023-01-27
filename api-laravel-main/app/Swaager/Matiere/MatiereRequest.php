<?php

namespace App\Swaager\Matiere;

/**
 * @OA\Schema(
 *      title="Save Matiere Request",
 *      type="object",
 *      required={"libelle", "code"}
 * )
 */
class MatiereRequest {


    /**
     * @OA\Property(
     *      title="libelle",
     *      description="libelle of the Matiere",
     *      example="Programmation avancée C++"
     * )
     *
     * @var string
     */
    public $libelle;

    /**
     * @OA\Property(
     *      title="code",
     *      description="code of the Matiere",
     *      example="C++"
     * )
     *
     * @var string
     */
    public $code;
}
