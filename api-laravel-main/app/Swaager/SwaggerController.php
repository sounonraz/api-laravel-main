<?php

namespace App\Swaager;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="IFRI-UAC notation, API Documentation",
 *      description="IFRI-UAC notation, API Documentation",
 *      @OA\Contact(
 *          email="contact@equipe-api.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="API Server"
 * )
 *
 *
 * @OA\Tag(
 *     name="Authentification",
 *     description="Routes for Authentification"
 * )
 *
 *
 * @OA\Tag(
 *     name="Niveau",
 *     description="Routes for Niveau"
 * )
 *
 * @OA\Tag(
 *     name="AnneeAcademique",
 *     description="Routes for AnneeAcademique"
 * )
 *
 * @OA\Tag(
 *     name="Filiere",
 *     description="Routes for Filiere"
 * )
 *
 * @OA\Tag(
 *     name="Classe",
 *     description="Routes for Classe"
 * )
 *
 * @OA\Tag(
 *     name="CritereNotation",
 *     description="Routes for CritereNotation"
 * )
 *
 *  @OA\Tag(
 *     name="Enseignant",
 *     description="Routes for Enseignant"
 * )
 *
 * @OA\Tag(
 *     name="Matiere",
 *     description="Routes for Matiere"
 * )
 *
 * @OA\Tag(
 *     name="FormulaireNotation",
 *     description="Routes for FormulaireNotation"
 * )
 *
 * @OA\Tag(
 *     name="Notation",
 *     description="Routes for Notation"
 * )
 *
 */
abstract class SwaggerController extends BaseController {

}
