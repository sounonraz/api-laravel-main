<?php

namespace App\Swaager;

/**
 * @OA\Get(
 *      path="/formulaires-notations",
 *      operationId="formulaireNotationList",
 *      tags={"FormulaireNotation"},
 *      summary="FormulaireNotation - List",
 *      description="Returns list FormulaireNotation",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/FormulaireNotationModel"))
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 *
 * @OA\Post(
 *      path="/formulaires-notations/create",
 *      operationId="createFormulaireNotation",
 *      tags={"FormulaireNotation"},
 *      summary="FormulaireNotation - Create",
 *      description="Returns FormulaireNotation created",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/FormulaireNotationResponse")
 *       ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/FormulaireNotationRequest")
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 *
 *
 * @OA\Put (
 *      path="/formulaires-notations/{id}/update",
 *      operationId="listNotation",
 *      tags={"FormulaireNotation"},
 *      summary="FormulaireNotation - Update",
 *      description="Returns updated FormulaireNotation",
 *     @OA\Parameter(
 *          name="id",
 *          description="Notation id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *     @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/FormulaireNotationRequest")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/FormulaireNotationResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 *
 *
 * @OA\Delete(
 *      path="/formulaires-notations/{id}/delete",
 *      operationId="deleteFormulaireNotation",
 *      tags={"FormulaireNotation"},
 *      summary="FormulaireNotation - Delete",
 *      description="Returns null FormulaireNotation",
 *     @OA\Parameter(
 *          name="id",
 *          description="FormulaireNotation id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/FormulaireNotationResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 */
class SwaagerFormulaireNotationController extends SwaggerController {

}
