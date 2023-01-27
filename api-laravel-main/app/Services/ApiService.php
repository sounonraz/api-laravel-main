<?php
namespace App\Services;

/**
 * Class ApiService
 * @package App\Services
 */
class ApiService {


    public static $HTTP_STATUS_200 = 200;
    public static $HTTP_STATUS_500 = 500;
    public static $HTTP_STATUS_401 = 401;
    public static $HTTP_STATUS_403 = 403;
    public static $HTTP_STATUS_422 = 422;
    public static $HTTP_STATUS_404 = 404;

    public static $MESSAGE_INTERNAL_SERVER_ERROR = "Une erreur interne est survenue";
    public static $MESSAGE_NOT_AUTHENTICATED = "Not authenticated";
    public static $MESSAGE_GRANT_NOT_ENOUGH = "Grant not enough to access this ressource";

    public static $MESSAGE_OBJECT_CREATED = "New object created successfully";
    public static $MESSAGE_OBJECT_UPDATED = "Object updated successfully";
    public static $MESSAGE_OBJECT_DESTROYED = "Object deleted successfully";
    public static $MESSAGE_RESSOURCE_NOT_FOUND = "Resource not found";
    public static $MESSAGE_DATA_ALREADY_EXIST = "Object already exist with same values";
}
