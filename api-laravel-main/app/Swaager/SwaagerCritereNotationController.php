<?php

namespace App\Swaager;

/**
 * @OA\Get(
 *      path="/criteres-notation",
 *      operationId="criteresNotationList",
 *      tags={"CritereNotation"},
 *      summary="CritereNotation - List",
 *      description="Returns list CritereNotation",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/CritereNotationModel"))
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
 *      path="/criteres-notation/create",
 *      operationId="createCritereNotation",
 *      tags={"CritereNotation"},
 *      summary="Filiere - Create",
 *      description="Returns CritereNotation created",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/CritereNotationResponse")
 *       ),
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/CritereNotationRequest")
 *      ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 *
 *
 * @OA\Put(
 *      path="/criteres-notation/{id}/update",
 *      operationId="updateCritereNotation",
 *      tags={"CritereNotation"},
 *      summary="CritereNotation - Update",
 *      description="Returns updated CritereNotation",
 *     @OA\Parameter(
 *          name="id",
 *          description="CritereNotation id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *     @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/CritereNotationRequest")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/CritereNotationResponse")
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
 *      path="/criteres-notation/{id}/delete",
 *      operationId="deleteCritereNotation",
 *      tags={"CritereNotation"},
 *      summary="CritereNotation - Delete",
 *      description="Returns null CritereNotation",
 *     @OA\Parameter(
 *          name="id",
 *          description="CritereNotation id",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="integer"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/CritereNotationResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 */
class SwaagerCritereNotationController extends SwaggerController {

}
