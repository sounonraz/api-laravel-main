<?php
namespace App\Services;

/**
 * Class CritereNotationService
 * @package App\Services
 */
class CritereNotationService {


    public static $TYPE_CRITERE_SELECT = "SELECT";
    public static $TYPE_CRITERE_TEXTAREA = "TEXTAREA";


    /**
     * @return string[]
     */
    public static function getTypesCriteres(): array {
        return [
            CritereNotationService::$TYPE_CRITERE_SELECT => "Choix multiples",
            CritereNotationService::$TYPE_CRITERE_TEXTAREA => "Champs de texte",
        ];
    }
}
