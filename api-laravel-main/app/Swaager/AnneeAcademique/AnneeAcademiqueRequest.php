<?php

namespace App\Swaager\AnneeAcademique;

/**
 * @OA\Schema(
 *      title="Save AnneeAcademique Request",
 *      type="object",
 *      required={"libelle"}
 * )
 */
class AnneeAcademiqueRequest {


    /**
     * @OA\Property(
     *      title="libelle",
     *      description="Libelle of the AnneeAcademique",
     *      example="2020-2021"
     * )
     *
     * @var string
     */
    public $libelle;
}
