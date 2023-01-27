<?php

namespace App\Swaager;

/**
 * @OA\Get(
 *      path="/classes",
 *      operationId="classeList",
 *      tags={"Classe"},
 *      summary="Classe - List",
 *      description="Returns list Classe",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/ClasseModel"))
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
 *      path="/classes/create",
 *      operationId="createClasse",
 *      tags={"Classe"},
 *      summary="AnneeAcademique - Create",
 *      description="Returns Classe created",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/ClasseResponse")
 *       ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/ClasseRequest")
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
 *      path="/classes/{id}/update",
 *      operationId="updateClasse",
 *      tags={"Classe"},
 *      summary="Classe - Update",
 *      description="Returns updated Classe",
 *     @OA\Parameter(
 *          name="id",
 *          description="Classe id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *     @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/ClasseRequest")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/ClasseResponse")
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
 *      path="/classes/{id}/delete",
 *      operationId="deleteClasse",
 *      tags={"Classe"},
 *      summary="Classe - Delete",
 *      description="Returns null Classe",
 *     @OA\Parameter(
 *          name="id",
 *          description="Classe id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/ClasseResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 */
class SwaagerClasseController extends SwaggerController {

}
