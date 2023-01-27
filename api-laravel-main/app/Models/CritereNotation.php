<?php

namespace App\Models;

use App\Services\CritereNotationService;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CritereNotation
 * @package App\Models
 */
class CritereNotation extends Model {

    protected $table = "critere_notation";

    /**
     * @var string[]
     */
    protected $fillable = [
        'libelle', 'type',
        'values', 'poids'
    ];

    /**
     * @param null $id
     * @param $data
     * @return mixed
     */
    public static function getRules($id = null, $data): array {
        $requirementLibelle = 'required|unique:niveau,libelle';
        if($id != null) {
            $requirementLibelle =  [
                'libelle' => $requirementLibelle.','. $id
            ];
        } else {
            $requirementLibelle = [
                'libelle' => $requirementLibelle
            ];
        }
        $requirementType = [
            'type' => "in:".CritereNotationService::$TYPE_CRITERE_SELECT.",".CritereNotationService::$TYPE_CRITERE_TEXTAREA,
        ];
        $requirementValues = [];
        if($data['type'] == CritereNotationService::$TYPE_CRITERE_SELECT) {
            $requirementValues  = [
              'values' => 'required'
            ];
        }
        $requirementPoids = [
            'poids' => 'required|numeric|min:1'
        ];
        // merges requirements
        return array_merge($requirementLibelle, $requirementType, $requirementValues, $requirementPoids);
    }
}
