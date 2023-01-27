<?php

namespace App\Swaager\Authentification;

/**
 * @OA\Schema(
 *      title="Login Request",
 *      type="object",
 *      required={"email", "password"}
 * )
 */
class LoginRequest {


    /**
     * @OA\Property(
     *      title="email",
     *      description="Email of the user",
     *      example="admin1998@gmail.com"
     * )
     *
     * @var string
     */
    public $email;


    /**
     * @OA\Property(
     *      title="password",
     *      description="Password of the user",
     *      example="1993_188jjdjdjz"
     * )
     *
     * @var string
     */
    public $password;
}
