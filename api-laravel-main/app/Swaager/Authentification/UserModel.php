<?php

namespace App\Swaager\Authentification;

/**
 * @OA\Schema(
 *     title="User Model",
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 */
class UserModel {


    /**
     * @OA\Property(
     *     title="id",
     *     description="Identifier",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="name",
     *      description="Name of user",
     *      example="Robert"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="email",
     *      description="email of user",
     *      example="admin1998@gmail.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="role",
     *      description="role of user",
     *      example="ETUDIANT"
     * )
     *
     * @var string
     */
    public $role;
}
