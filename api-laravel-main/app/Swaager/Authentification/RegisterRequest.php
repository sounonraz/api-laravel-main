<?php

namespace App\Swaager\Authentification;

/**
 * @OA\Schema(
 *      title="Register Request",
 *      type="object",
 *      required={"email", "password", "role"}
 * )
 */


class RegisterRequest {


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

    /**
     * @OA\Property(
     *      title="role",
     *      description="Role of the user",
     *      example="ADMIN or ETUDIANT"
     * )
     *
     * @var string
     */
    public $role;

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of the user",
     *      example="Francis"
     * )
     *
     * @var string
     */
    public $name;
}
