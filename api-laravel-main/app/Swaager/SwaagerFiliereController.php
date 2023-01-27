<?php

namespace App\Swaager;

/**
 * @OA\Get(
 *      path="/filieres",
 *      operationId="filieresList",
 *      tags={"Filiere"},
 *      summary="Filiere - List",
 *      description="Returns list Filiere",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/FiliereModel"))
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
 *      path="/filieres/create",
 *      operationId="createFiliere",
 *      tags={"Filiere"},
 *      summary="Filiere - Create",
 *      description="Returns Filiere created",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/FiliereResponse")
 *       ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/FiliereRequest")
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
 *      path="/filieres/{id}/update",
 *      operationId="updateFiliere",
 *      tags={"Filiere"},
 *      summary="Filiere - Update",
 *      description="Returns updated Filiere",
 *     @OA\Parameter(
 *          name="id",
 *          description="Filiere id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *     @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/FiliereRequest")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/FiliereResponse")
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
 *      path="/filieres/{id}/delete",
 *      operationId="deleteFiliere",
 *      tags={"Filiere"},
 *      summary="Filiere - Delete",
 *      description="Returns null Filiere",
 *     @OA\Parameter(
 *          name="id",
 *          description="Filiere id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/FiliereResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 */
class SwaagerFiliereController extends SwaggerController {

}
