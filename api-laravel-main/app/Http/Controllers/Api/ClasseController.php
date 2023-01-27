<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Niveau;
use App\Models\Filiere;
use App\Models\AnnneeAcademique;
use App\Services\ApiService;
use App\Services\ClasseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Validator;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $classes = Classe::query()
                ->with(["niveau", "filiere", "annee_academique"])
                ->orderBy('annee_academique_id')
                ->get();
            return response([
                'classes' => $classes
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
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request) {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), Classe::getRules());
            if ($validator->fails()) {
                return response(['errors'=>$validator->errors()], ApiService::$HTTP_STATUS_422);
            }
            $oldClasse = ClasseService::getClasseByNiveauIdAndAnneeAndFiliere($request->niveau_id, $request->annee_academique_id, $request->filiere_id)->first();
            if($oldClasse != null) {
                return response([
                    'errors' => [],
                    'message' => ApiService::$MESSAGE_DATA_ALREADY_EXIST,
                ], ApiService::$HTTP_STATUS_422);
            }
            $classe = Classe::query()->create($request->all());
            DB::commit();
                return response([
                    'classe' => $classe,
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
            $validator = Validator::make($request->all(), Classe::getRules());
            if ($validator->fails()) {
                return response(['errors'=>$validator->errors()], ApiService::$HTTP_STATUS_422);
            }
            $oldClasse = ClasseService::getClasseByNiveauIdAndAnneeAndFiliere($request->niveau_id, $request->annee_academique_id, $request->filiere_id)->first();
            if($oldClasse == null) {
                return response([
                    'errors' => [],
                    'message' => ApiService::$MESSAGE_RESSOURCE_NOT_FOUND,
                ], ApiService::$HTTP_STATUS_422);
            }
            $otherClasse = ClasseService::getClasseByNiveauIdAndAnneeAndFiliere($request->niveau_id, $request->annee_academique_id, $request->filiere_id)
                ->where('id', '!=', $oldClasse->id)
                ->first();
            if($otherClasse != null ) {
                return response([
                    'errors' => [],
                    'message' => ApiService::$MESSAGE_DATA_ALREADY_EXIST,
                ], ApiService::$HTTP_STATUS_422);
            }
            $oldClasse->update($request->all());
            DB::commit();
            return response([
                'classe' => $oldClasse,
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
            $classe = Classe::query()
                ->where('id', '=', $id)
                ->first();
            if($classe == null) {
                return response()->json([
                    'message'=> ApiService::$MESSAGE_RESSOURCE_NOT_FOUND,
                ], ApiService::$HTTP_STATUS_404);
            }
            $classe->delete();
            DB::commit();
            return response([
                'classe' => null,
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
