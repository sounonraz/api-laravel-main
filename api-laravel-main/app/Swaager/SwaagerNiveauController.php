<?php

namespace App\Swaager;

/**
 * @OA\Get(
 *      path="/niveaux",
 *      operationId="niveauList",
 *      tags={"Niveau"},
 *      summary="Niveaux - List",
 *      description="Returns list niveau",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/NiveauModel"))
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
 *      path="/niveaux/create",
 *      operationId="createNiveau",
 *      tags={"Niveau"},
 *      summary="Niveaux - Create",
 *      description="Returns niveau created",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/NiveauResponse")
 *       ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/NiveauRequest")
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
 *      path="/niveaux/{id}/update",
 *      operationId="listNiveaux",
 *      tags={"Niveau"},
 *      summary="Niveaux - Update",
 *      description="Returns updated niveau",
 *     @OA\Parameter(
 *          name="id",
 *          description="Niveau id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *     @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/NiveauRequest")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/NiveauResponse")
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
 *      path="/niveaux/{id}/delete",
 *      operationId="deleteNiveaux",
 *      tags={"Niveau"},
 *      summary="Niveaux - Delete",
 *      description="Returns null niveau",
 *     @OA\Parameter(
 *          name="id",
 *          description="Niveau id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/NiveauResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 */

class SwaagerNiveauController extends SwaggerController {

}
