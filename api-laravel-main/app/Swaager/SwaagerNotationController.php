<?php

namespace App\Swaager;

/**
 * @OA\Get(
 *      path="/formulaires-notations/{codeFormulaireNotation}/notations",
 *      operationId="notationList",
 *      tags={"Notation"},
 *      summary="Notation - List",
 *      description="Returns list Notation",
 *      @OA\Parameter(
 *          name="codeFormulaireNotation",
 *          description="Code formulaire notation",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/ListNotationResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 *
 *
 * @OA\Get(
 *      path="/formulaires-notations/{codeFormulaireNotation}/notations/{notationId}",
 *      operationId="notationItem",
 *      tags={"Notation"},
 *      summary="Notation - Item",
 *      description="Returns Notation",
 *       @OA\Parameter(
 *          name="codeFormulaireNotation",
 *          description="Code formulaire notation",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="notationId",
 *          description="Notation id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/NotationResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 */
class SwaagerNotationController extends SwaggerController {

}
