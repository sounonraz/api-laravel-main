<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CritereNotation;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Exception;

class CritereNotationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function index() {
        try {
            $criteres = CritereNotation::query()->orderBy('poids', 'DESC')->get();
            return response([
                'criteres' => $criteres
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
            $validator = Validator::make($request->all(), CritereNotation::getRules(null, $request->all()));
            if ($validator->fails()) {
                return response(['errors'=>$validator->errors()], ApiService::$HTTP_STATUS_422);
            }
            $critereNotation = CritereNotation::query()->create($request->all());
            DB::commit();
            return response([
                'critereNotation' => $critereNotation,
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
            $critereNotation = CritereNotation::query()->where('id', '=', $id)->first();
            if($critereNotation == null) {
                return response(
                    ['message'=> ApiService::$MESSAGE_RESSOURCE_NOT_FOUND],
                    ApiService::$HTTP_STATUS_404
                );
            }
            $validator = Validator::make($request->all(), CritereNotation::getRules($id, $request->all()));
            if($validator->fails()){
                return response(['errors'=>$validator->errors()], ApiService::$HTTP_STATUS_422);
            }
            $critereNotation->libelle = $request->input('libelle');
            $critereNotation->type = $request->input('type');
            $critereNotation->values = $request->input('values');
            $critereNotation->poids = $request->input('poids');
            $critereNotation->save();
            DB::commit();
            return response([
                'critereNotation' => $critereNotation,
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
            $critereNotation = CritereNotation::query()
                ->where('id', '=', $id)
                ->first();
            if($critereNotation == null) {
                return response()->json([
                    'message'=> ApiService::$MESSAGE_RESSOURCE_NOT_FOUND,
                ], ApiService::$HTTP_STATUS_404);
            }
            $critereNotation->delete();
            DB::commit();
            return response([
                'critereNotation' => null,
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
