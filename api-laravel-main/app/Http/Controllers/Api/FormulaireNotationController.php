<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FormulaireNotation;
use App\Services\ApiService;
use App\Services\FormulaireNotationService;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

/**
 * Class FormulaireNotationController
 * @package App\Http\Controllers\Api
 */
class FormulaireNotationController extends Controller {

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index() {
        try {
            $formulairesNotation = FormulaireNotation::query()->orderBy('created_at', 'DESC')->get();
            return response([
                'formulairesNotation' => $formulairesNotation
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function create(Request $request) {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), FormulaireNotation::getRules());
            if ($validator->fails()) {
                return response(['errors'=>$validator->errors()], ApiService::$HTTP_STATUS_422);
            }
            $oldFormulaireNotation = FormulaireNotationService::getNotationByClasseAndMatiereAndEnseignant(
                $request->input('classe_id'),
                $request->input('matiere_id'),
                $request->input('enseignant_id')
            )->first();
            if($oldFormulaireNotation != null) {
                return response([
                    'errors' => [],
                    'message' => ApiService::$MESSAGE_DATA_ALREADY_EXIST,
                ], ApiService::$HTTP_STATUS_422);
            }
            $data = $request->all();
            $data['code'] = FormulaireNotationService::generateNewCodeNotation(
                $request->input('classe_id'),
                $request->input('matiere_id'),
                $request->input('enseignant_id')
            );
            $formulaireNotation = FormulaireNotation::query()->create($data);
            DB::commit();
            return response([
                'formulaireNotation' => $formulaireNotation,
                'message' => ApiService::$MESSAGE_OBJECT_CREATED
            ]);
        }catch(Exception $ex){
            DB::rollBack();
            Log::error($ex->getMessage());
            return response()->json([
                'message'=> ApiService::$MESSAGE_INTERNAL_SERVER_ERROR,
                'error'=> $ex->getMessage(),
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
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), FormulaireNotation::getRules());
            if ($validator->fails()) {
                return response(['errors'=>$validator->errors()], ApiService::$HTTP_STATUS_422);
            }
            $oldFormulaireNotation = FormulaireNotation::query()->where('id', '=', $id)->first();
            if($oldFormulaireNotation == null) {
                return response(
                    ['errors'=> ApiService::$MESSAGE_RESSOURCE_NOT_FOUND],
                    ApiService::$HTTP_STATUS_404);
            }
            $oldFormulaireNotation = FormulaireNotationService::getNotationByClasseAndMatiereAndEnseignant(
                $request->input('classe_id'),
                $request->input('matiere_id'),
                $request->input('enseignant_id'),
            )->where('id', '!=', $id)
            ->first();
            if($oldFormulaireNotation != null) {
                return response([
                    'errors' => [],
                    'message' => ApiService::$MESSAGE_DATA_ALREADY_EXIST,
                ], ApiService::$HTTP_STATUS_422);
            }
            $oldFormulaireNotation->classe_id = $request->input("enseignant_id");
            $oldFormulaireNotation->matiere_id = $request->input("enseignant_id");
            $oldFormulaireNotation->enseignant_id = $request->input("enseignant_id");
            $oldFormulaireNotation->code = FormulaireNotationService::generateNewCodeNotation(
                $request->input('classe_id'),
                $request->input('matiere_id'),
                $request->input('enseignant_id')
            );
            $oldFormulaireNotation->save();
            DB::commit();
            return response([
                'formulaireNotation' => $oldFormulaireNotation,
                'message' => ApiService::$MESSAGE_OBJECT_UPDATED
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
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            DB::beginTransaction();
            $formulaireNotation = FormulaireNotation::query()
                ->where('id', '=', $id)
                ->first();
            if($formulaireNotation == null) {
                return response()->json([
                    'message'=> ApiService::$MESSAGE_RESSOURCE_NOT_FOUND,
                ], ApiService::$HTTP_STATUS_404);
            }
            $formulaireNotation->delete();
            DB::commit();
            return response([
                'notation' => null,
                'message' => ApiService::$MESSAGE_OBJECT_DESTROYED,
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
     * Get formulaire by code
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFormulaireByCode($code) {
        try {
            $user = Auth::guard('api')->user();
            $formulaireNotation = FormulaireNotation::query()
                ->where('code', '=', $code);
            // user anonymous{
            if($user->role == RoleService::$ROLE_ETUDIANT) {
                $haveAlreadyAnswered = FormulaireNotation::query()
                    ->where('code', $code)
                    ->whereHas("notations", function ($query) use ($user){
                        $query->where('user_id', "=", $user->id);
                    });
                if($haveAlreadyAnswered->exists()) {
                    return response()->json([
                        'message' => FormulaireNotationService::$MESSAGE_USER_HAS_ALREADY_ANSWERED,
                        'error' => FormulaireNotationService::$MESSAGE_USER_HAS_ALREADY_ANSWERED,
                        'notation' => $haveAlreadyAnswered->first(),
                    ], ApiService::$HTTP_STATUS_200);
                }
                $formulaireNotation->where('classe_id', '=', $user->classe_id);
            }
            $formulaireNotation = $formulaireNotation->first();
            if($formulaireNotation == null) {
                return response()->json([
                    'message'=> ApiService::$MESSAGE_RESSOURCE_NOT_FOUND,
                ], ApiService::$HTTP_STATUS_404);
            }
            return response()->json([
                'formulaireNotation'=> $formulaireNotation,
            ]);
        }catch(Exception $ex){
            Log::error($ex->getMessage());
            return response()->json([
                'message'=> ApiService::$MESSAGE_INTERNAL_SERVER_ERROR,
            ], ApiService::$HTTP_STATUS_500);
        }
    }

}
