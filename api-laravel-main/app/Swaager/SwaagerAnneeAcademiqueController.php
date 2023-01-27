<?php

namespace App\Swaager;


/**
 * @OA\Get(
 *      path="/annees-academiques",
 *      operationId="anneeAcademiqueList",
 *      tags={"AnneeAcademique"},
 *      summary="Années Académiques - List",
 *      description="Returns list années académqiues",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/AnneeAcademiqueModel"))
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 *
 *
 * @OA\Post(
 *      path="/annees-academiques/create",
 *      operationId="createAnneeAcademique",
 *      tags={"AnneeAcademique"},
 *      summary="AnneeAcademique - Create",
 *      description="Returns AnneeAcademique created",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/AnneeAcademiqueResponse")
 *       ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/AnneeAcademiqueRequest")
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
 *      path="/annees-academiques/{id}/update",
 *      operationId="updateAnneeAcademique",
 *      tags={"AnneeAcademique"},
 *      summary="AnneeAcademique - Update",
 *      description="Returns updated AnneeAcademique",
 *     @OA\Parameter(
 *          name="id",
 *          description="AnneeAcademique id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *     @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/AnneeAcademiqueRequest")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/AnneeAcademiqueResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 *
 *
 * @OA\Delete (
 *      path="/annees-academiques/{id}/delete",
 *      operationId="deleteAnneeAcademique",
 *      tags={"AnneeAcademique"},
 *      summary="AnneeAcademique - Delete",
 *      description="Returns null AnneeAcademique",
 *     @OA\Parameter(
 *          name="id",
 *          description="AnneeAcademique id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/AnneeAcademiqueResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 */
class SwaagerAnneeAcademiqueController extends SwaggerController {

}
