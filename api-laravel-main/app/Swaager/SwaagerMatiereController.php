<?php

namespace App\Swaager;

/**
 * @OA\Get(
 *      path="/matieres",
 *      operationId="matiereList",
 *      tags={"Matiere"},
 *      summary="Matiere - List",
 *      description="Returns list Matiere",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/MatiereModel"))
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
 *      path="/matieres/create",
 *      operationId="createMatiere",
 *      tags={"Matiere"},
 *      summary="Matiere - Create",
 *      description="Returns Matiere created",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/MatiereResponse")
 *       ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/MatiereRequest")
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
 *      path="/matieres/{id}/update",
 *      operationId="updateMatiere",
 *      tags={"Matiere"},
 *      summary="Matiere - Update",
 *      description="Returns updated Matiere",
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
 *          @OA\JsonContent(ref="#/components/schemas/MatiereRequest")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/MatiereResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 *
 * @OA\Delete(
 *      path="/matieres/{id}/delete",
 *      operationId="deleteMatiere",
 *      tags={"Matiere"},
 *      summary="Matiere - Delete",
 *      description="Returns null Matiere",
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
 *          @OA\JsonContent(ref="#/components/schemas/MatiereResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 */
class SwaagerMatiereController extends SwaggerController {

}
