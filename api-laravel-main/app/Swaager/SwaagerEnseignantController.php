<?php

namespace App\Swaager;

/**
 * @OA\Get(
 *      path="/enseignants",
 *      operationId="enseignantList",
 *      tags={"Enseignant"},
 *      summary="Enseignant - List",
 *      description="Returns list Enseignant",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/EnseignantModel"))
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 *
 * @OA\Post(
 *      path="/enseignants/create",
 *      operationId="createEnseignant",
 *      tags={"Enseignant"},
 *      summary="Enseignant - Create",
 *      description="Returns Enseignant created",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/EnseignantResponse")
 *       ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/EnseignantRequest")
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
 *      path="/enseignants/{id}/update",
 *      operationId="updateEnseignant",
 *      tags={"Enseignant"},
 *      summary="Enseignant - Update",
 *      description="Returns updated Enseignant",
 *     @OA\Parameter(
 *          name="id",
 *          description="Enseignant id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *     @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/EnseignantRequest")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/EnseignantResponse")
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
 *      path="/enseignants/{id}/delete",
 *      operationId="deleteEnseignant",
 *      tags={"Enseignant"},
 *      summary="Enseignant - Delete",
 *      description="Returns null Enseignant",
 *     @OA\Parameter(
 *          name="id",
 *          description="Enseignant id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/EnseignantResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 */
class SwaagerEnseignantController extends SwaggerController {

}
