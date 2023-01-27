<?php
namespace App\Services;

/**
 * Class RoleService
 * @package App\Services
 */
class RoleService {


    public static $ROLE_ADMIN = "ADMIN";
    public static $ROLE_ETUDIANT = "ETUDIANT";


    /**
     * @return string[]
     */
    public static function getRoles(): array {
        return [
            RoleService::$ROLE_ADMIN => "Administrateur",
            RoleService::$ROLE_ETUDIANT => "Etudiant",
        ];
    }
}
