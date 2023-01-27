<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Filiere;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Validator;

/**
 * Class FiliereController
 * @package App\Http\Controllers
 */
class FiliereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $filieres = Filiere::query()->orderBy('libelle')->get();
            return response([
                'filieres' => $filieres
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), Filiere::getRules());
            if ($validator->fails()) {
                return response(['errors'=>$validator->errors()], ApiService::$HTTP_STATUS_422);
            }
            $filiere = Filiere::query()->create($request->all());
            DB::commit();
            return response([
                'filiere' => $filiere,
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $filiere = Filiere::query()->where('id', '=', $id)->first();
            if($filiere == null) {
                return response(
                    ['message'=> ApiService::$MESSAGE_RESSOURCE_NOT_FOUND],
                    ApiService::$HTTP_STATUS_404
                );
            }
            $validator = Validator::make($request->all(), Filiere::getRules($id));
            if($validator->fails()){
                return response(['errors'=>$validator->errors()], ApiService::$HTTP_STATUS_422);
            }
            $filiere->libelle = $request->input('libelle');
            $filiere->code = $request->input('code');
            $filiere->save();
            DB::commit();
            return response([
                'filiere' => $filiere,
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
            $filiere = Filiere::query()
                ->where('id', '=', $id)
                ->first();
            if($filiere == null) {
                return response()->json([
                    'message'=> ApiService::$MESSAGE_RESSOURCE_NOT_FOUND,
                ], ApiService::$HTTP_STATUS_404);
            }
            $filiere->delete();
            DB::commit();
            return response([
                'filiere' => null,
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
