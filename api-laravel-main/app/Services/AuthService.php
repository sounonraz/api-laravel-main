<?php
namespace App\Services;

/**
 *
 * Class AuthService
 * @package App\Services
 */
class AuthService {

    public static $INVALID_FORM = "Invalid form";
    public static $WRONG_CREDANTIALS = "These credentials do not match our records.";
    public static $USER_NOT_FOUND = "User not found";
    public static $LOGIN_SUCCESS = "Login success";
    public static $REGISTER_SUCCESS = "Register success";

    public static $TOKEN_EXPIRE_IN = 2; // days
    public static $REFRESH_TOKEN_EXPIRE_IN = 10; // days
}
