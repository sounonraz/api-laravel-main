<?php

namespace App\Swaager;

/**
 * @OA\Post(
 *      path="/login",
 *      operationId="login",
 *      tags={"Authentification"},
 *      summary="Authentification - Login",
 *      description="Returns user with access token",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/AuthResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     )
 *
 * @OA\Post(
 *      path="/login-anonymous",
 *      operationId="loginAnonymous",
 *      tags={"Authentification"},
 *      summary="Authentification - Anonymous",
 *      description="Returns user with access token",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/AuthResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     )
 *
 * @OA\Post(
 *      path="/users/generate-credentials",
 *      operationId="generateCredentials",
 *      tags={"Authentification"},
 *      summary="Authentification - Generate credentials",
 *      description="Returns users list",
 *      @OA\RequestBody(
 *          required=true,
 *          @OA\JsonContent(ref="#/components/schemas/CredentialRequest")
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/CredentialModel"))
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 *
 *
 * @OA\Get (
 *      path="/users/etudiants/classe/{classe_id}",
 *      operationId="getCredentials",
 *      tags={"Authentification"},
 *      summary="Authentification - Get credentials by classe",
 *      description="Returns users list",
 *     @OA\Parameter(
 *          name="classe_id",
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
 *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/CredentialModel"))
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 *
 * @OA\Get (
 *      path="/users/role/{name}",
 *      operationId="getUsers",
 *      tags={"Authentification"},
 *      summary="Authentification - Get users by name",
 *      description="Returns users list",
 *     @OA\Parameter(
 *          name="name",
 *          description="Role name",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/UserModel"))
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
 *      path="/logout",
 *      operationId="logout",
 *      tags={"Authentification"},
 *      summary="Authentification - Logout",
 *      description="Returns message",
 *      @OA\Response(
 *          response=200,
 *          description="Successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/LogoutResponse")
 *       ),
 *      @OA\Response(
 *          response=401,
 *          description="Unauthenticated",
 *      ),
 *     security={{"bearer_token":{}}}
 *     )
 *
 */
class SwaggerAuthController extends SwaggerController {

}
