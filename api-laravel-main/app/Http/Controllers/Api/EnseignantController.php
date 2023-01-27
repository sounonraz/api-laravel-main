<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enseignant;
use App\Services\ApiService;
use App\Services\EnseignantService;
use App\Services\FormulaireNotationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;

class EnseignantController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index() {
        try {
            $enseignants = Enseignant::query()->orderBy('nom')->get();
            return response([
                'enseignants' => $enseignants
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), Enseignant::getRules());
            if ($validator->fails()) {
                return response(['errors'=>$validator->errors()], ApiService::$HTTP_STATUS_422);
            }
            $oldEnseignant = EnseignantService::getEnseinantByNameAndPrenoms(
                $request->input('nom'),
                $request->input('prenoms'),
            )->first();
            if($oldEnseignant != null) {
                return response([
                    'errors' => [],
                    'message' => ApiService::$MESSAGE_DATA_ALREADY_EXIST,
                ], ApiService::$HTTP_STATUS_422);
            }
            $enseignant = Enseignant::query()->create($request->all());
            DB::commit();
            return response([
                'enseignant' => $enseignant,
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
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), Enseignant::getRules());
            if ($validator->fails()) {
                return response(['errors'=>$validator->errors()], ApiService::$HTTP_STATUS_422);
            }
            $enseignant = Enseignant::query()->where('id', '=', $id)->first();
            if($enseignant == null) {
                return response([
                    'errors' => [],
                    'message' => ApiService::$MESSAGE_DATA_ALREADY_EXIST,
                ], ApiService::$HTTP_STATUS_404);
            }
            $oldEnseignant = EnseignantService::getEnseinantByNameAndPrenoms(
                $request->input('nom'),
                $request->input('prenoms'),
            )->where('id', '!=', $id)->first();
            if($oldEnseignant != null) {
                return response([
                    'errors' => [],
                    'message' => ApiService::$MESSAGE_DATA_ALREADY_EXIST,
                ], ApiService::$HTTP_STATUS_422);
            }
            $enseignant->nom = $request->input('nom');
            $enseignant->prenoms = $request->input('prenoms');
            $enseignant->save();
            DB::commit();
            return response([
                'enseignant' => $enseignant,
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
     * Remove the specified resource from storage.
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            DB::beginTransaction();
            $enseignant = Enseignant::query()
                ->where('id', '=', $id)
                ->first();
            if($enseignant == null) {
                return response()->json([
                    'message'=> ApiService::$MESSAGE_RESSOURCE_NOT_FOUND,
                ], ApiService::$HTTP_STATUS_404);
            }
            $enseignant->delete();
            DB::commit();
            return response([
                'enseignant' => null,
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
}
