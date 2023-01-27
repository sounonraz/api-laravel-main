<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\CritereNotation;
use App\Models\FormulaireNotation;
use App\Models\LigneNotation;
use App\Models\Notation;
use App\Services\ApiService;
use App\Services\NotationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;

/**
 * Class NotationController
 * @package App\Http\Controllers\Api
 */
class NotationController extends Controller {

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @param $codeFormulaireNotation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index(Request $request, $codeFormulaireNotation) {
        try {
            $notations = Notation::query()
                ->whereHas('formulaireNotation', function ($query) use ($codeFormulaireNotation) {
                    $query->where('code', '=', $codeFormulaireNotation);
                })
                ->orderBy('created_at')
                ->get();
            return response([
                'notations' => $notations
            ]);
        }catch(Exception $ex){
            Log::error($ex->getMessage());
            return response()->json([
                'message'=> ApiService::$MESSAGE_INTERNAL_SERVER_ERROR,
            ], ApiService::$HTTP_STATUS_500);
        }
    }

    /**
     * @param Request $request
     * @param $codeFormulaireNotation
     * @param $notationId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function showNotation(Request $request, $codeFormulaireNotation, $notationId) {
        try {
            $notation = Notation::query()
                ->whereHas('formulaireNotation', function ($query) use ($codeFormulaireNotation) {
                    $query->where('code', '=', $codeFormulaireNotation);
                })
                ->where('id', '=', $notationId)
                ->orderBy('created_at')
                ->first();
            return response([
                'notation' => $notation
            ]);
        }catch(Exception $ex){
            Log::error($ex->getMessage());
            return response()->json([
                'message'=> ApiService::$MESSAGE_INTERNAL_SERVER_ERROR,
            ], ApiService::$HTTP_STATUS_500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param $codeFormulaireNotation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request, $codeFormulaireNotation) {
        try {
            DB::beginTransaction();
            $formulaireNotation = FormulaireNotation::query()
                ->where('code', '=', $codeFormulaireNotation)
                ->first();
            if($formulaireNotation == null) {
                return response([
                    'message' => ApiService::$MESSAGE_RESSOURCE_NOT_FOUND
                ], ApiService::$HTTP_STATUS_422);
            }
            $dataNotation = [
                "user_id" => Auth::guard('api')->user()->id,
                "formulaire_notation_id" => $formulaireNotation->id
            ];
            $oldNotation = Notation::query()
                ->where('user_id', '=', $dataNotation['user_id'])
                ->where('formulaire_notation_id', "=", $dataNotation["formulaire_notation_id"])
                ->first();
            if($oldNotation != null) {
                return response([
                    'message' => NotationService::$MESSAGE_HAS_ALREADY_ANSWERED
                ], ApiService::$HTTP_STATUS_422);
            }
            // create
            $notation = Notation::query()->create($dataNotation);
            $lignes = $request->input("lignes");
            foreach ($lignes as $ligne) {
                $critere = CritereNotation::query()->where('id', '=', $ligne['critere_notation_id'])->first();
                if($critere == null) {
                    DB::rollBack();
                    return response([
                        'message' => ApiService::$MESSAGE_RESSOURCE_NOT_FOUND
                    ], ApiService::$HTTP_STATUS_404);
                }
                $reponse = $ligne['reponse'];
                if(!isset($reponse)) {
                    DB::rollBack();
                    return response([
                        'message' => "",
                        "error" => ['reponse' => "required field"]
                    ], ApiService::$HTTP_STATUS_404);
                }
                // create ligne-notation
                LigneNotation::query()->create([
                    'notation_id' => $notation->id,
                    'critere_notation_id' => $critere->id,
                    'reponse' => $reponse
                ]);
            }
            DB::commit();
            return response([
                'message' => ApiService::$MESSAGE_OBJECT_CREATED,
            ]);
        }catch(Exception $ex){
            DB::rollBack();
            Log::error($ex->getMessage());
            return response()->json([
                'message'=> ApiService::$MESSAGE_INTERNAL_SERVER_ERROR,
            ], ApiService::$HTTP_STATUS_500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
