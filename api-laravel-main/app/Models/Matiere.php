<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Matiere
 * @package App\Models
 */
class Matiere extends Model {

    protected $table = "matiere";

    /**
     * @var string[]
     */
    protected $fillable = [
        'libelle', 'code',
    ];

    /**
     * @param null $id
     * @return string[]
     */
    public static function getRules($id = null): array {
        $requirementLibelle = 'required|unique:matiere,libelle';
        $requirementCode = 'required|unique:matiere,code';
        if($id != null) {
            return [
                'libelle' => $requirementLibelle.','. $id,
                'code' => $requirementCode.','. $id
            ];
        } else {
            return [
                'libelle' => $requirementLibelle,
                'code' => $requirementCode
            ];
        }
    }

}
