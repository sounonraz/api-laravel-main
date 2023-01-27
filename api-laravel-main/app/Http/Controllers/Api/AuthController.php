<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Filiere;
use App\Models\User;
use App\Services\ApiService;
use App\Services\AuthService;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends Controller {


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function loginUserAnonymous(Request $request) {
        try{
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'qrcode' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'message'=> AuthService::$INVALID_FORM
                ], ApiService::$HTTP_STATUS_401);
            }
            $user = UserService::getUserAnonymousByQrCode($request->qrcode);
            if ($user == null) {
                return response([
                    'message' => AuthService::$WRONG_CREDANTIALS
                ], ApiService::$HTTP_STATUS_401);
            }
            auth()->setUser($user);
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            DB::commit();
                return response( [
                    'user' => $user,
                    'access_token' => $accessToken,
                    'message' => AuthService::$LOGIN_SUCCESS,
                    ], ApiService::$HTTP_STATUS_200);
        }catch(Exception $ex){
            DB::rollBack();
            Log::error($ex->getMessage());
            return response()->json([
                'message'=> ApiService::$MESSAGE_INTERNAL_SERVER_ERROR,
            ],ApiService::$HTTP_STATUS_500);
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function login(Request $request) {
        try{
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'email' => 'email|required',
                'password' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'message'=> AuthService::$INVALID_FORM
                ], ApiService::$HTTP_STATUS_401);
            }
            $loginData = $request->only('email', 'password');
            if (!auth()->attempt($loginData)) {
                return response([
                    'message' => AuthService::$WRONG_CREDANTIALS
                ], ApiService::$HTTP_STATUS_401);
            }
            if ( auth()->user()->status !=  UserService::$USER_STATUS_ACTIF) {
                return response([
                    'message' => AuthService::$WRONG_CREDANTIALS
                ], ApiService::$HTTP_STATUS_401);
            }
            if(auth()->user() != null && auth()->user()->role != RoleService::$ROLE_ETUDIANT) {
                $accessToken = auth()->user()->createToken('authToken')->accessToken;
                DB::commit();
                return response( [
                    'user' => UserService::loadUserByEmail($request->input('email')),
                    'access_token' => $accessToken,
                    'message' => AuthService::$LOGIN_SUCCESS,
                ], ApiService::$HTTP_STATUS_200);
            } else {
                return response( [
                    'message' => AuthService::$USER_NOT_FOUND,
                ], ApiService::$HTTP_STATUS_401);
            }

        }catch(Exception $ex){
            DB::rollBack();
            Log::error($ex->getMessage());
            return response()->json([
                'message'=> ApiService::$MESSAGE_INTERNAL_SERVER_ERROR,
            ],ApiService::$HTTP_STATUS_500);
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function register (Request $request) {
        try{
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'role' => "in:".RoleService::$ROLE_ETUDIANT.",".RoleService::$ROLE_ADMIN,
            ]);
            if ($validator->fails())  {
                return response(['errors'=>$validator->errors()], ApiService::$HTTP_STATUS_422);
            }
            $request['password'] = Hash::make($request['password']);
            $request['remember_token'] = Str::random(10);
            $user = User::create($request->toArray());
            $token = $user->createToken('authToken')->accessToken;
            DB::commit();
            return response([
                "user" => $user,
                "token" => $token,
                'message' => AuthService::$REGISTER_SUCCESS
            ]);

        }catch(Exception $ex){
            DB::rollBack();
            Log::error($ex->getMessage());
            return response()->json([
                'message'=> ApiService::$MESSAGE_INTERNAL_SERVER_ERROR,
            ],ApiService::$HTTP_STATUS_500);
        }
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function userInfo() {
        try {
            $user = Auth::guard('api')->user();
            return response()->json(['user' => $user]);
        }catch(Exception $ex){

            Log::error($ex->getMessage());
            return response()->json([
                'message'=> ApiService::$MESSAGE_INTERNAL_SERVER_ERROR,
            ], ApiService::$HTTP_STATUS_500);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function userList() {
        try {
            $users = User::query()->get();
            return response()->json(['users' => $users]);
        }catch(Exception $ex){

            Log::error($ex->getMessage());
            return response()->json([
                'message'=> ApiService::$MESSAGE_INTERNAL_SERVER_ERROR,
            ], ApiService::$HTTP_STATUS_500);
        }
    }

    public function usersGetBy(Request $request) {
        try {
            // error_log('bof');
            // $request->attribut
            // $request->value
            // echo $request->attribut ;
            // echo $request->value;
            $users = User::where($request->attribut,'=',$request->value)->get();
            return response()->json(['users' => $users]);
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
    public function generateCredentials(Request $request) {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), User::getRulesCredentialsGeneration());
            if ($validator->fails()) {
                DB::rollBack();
                return response(['errors'=>$validator->errors()], ApiService::$HTTP_STATUS_422);
            }
            $effectif = $request->input('effectif');
            $credentials = [];
            $classe_id = $request->input('classe_id');
            // delete old credentials
            UserService::deleteOldCredentialsForClasse($classe_id);
            for($i = 1; $i <= (int)$effectif; $i++) {
                $credential = UserService::generateCredentials($i, $request->input('classe_id'));
                $user = UserService::saveCredential($credential['email'], $credential['plain_password'], $classe_id);
                array_push($credentials, [
                    'qrcode' => $user->qrcode
                ]);
            }
            DB::commit();
            return response()->json([
                'users' => $credentials,
                'message'=> ApiService::$MESSAGE_OBJECT_CREATED,
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function usersByRole($name) {
        try {
            if (in_array($name, array_keys(RoleService::getRoles()))){
                $users = User::where('role', $name)->get();
                return response()->json(['users' => $users]);
            }
            return response(['message'=> ApiService::$MESSAGE_RESSOURCE_NOT_FOUND], ApiService::$HTTP_STATUS_422);
        }catch(Exception $ex){
            Log::error($ex->getMessage());
            return response()->json([
                'message'=> ApiService::$MESSAGE_INTERNAL_SERVER_ERROR,
            ], ApiService::$HTTP_STATUS_500);
        }
    }

    /**
     * @param $classe_id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function usersEtudiantByClass($classe_id) {
        try {
            $users = User::where('role', RoleService::$ROLE_ETUDIANT)->where('classe_id', $classe_id)->get();
            return response()->json(['users' => $users]);
        }catch(Exception $ex){
            Log::error($ex->getMessage());
            return response()->json([
                'message'=> ApiService::$MESSAGE_INTERNAL_SERVER_ERROR,
            ], ApiService::$HTTP_STATUS_500);
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout (Request $request) {
        try{
            $accessToken = Auth::guard('api')->user()->token();
            $accessToken->revoke();
            $accessToken->delete();
            return response()->json(['message' => 'You have been successfully logged out.'], 200);
        }catch(Exception $ex){

            Log::error($ex->getMessage());
            return response()->json([
                'message'=> $ex->getMessage(),
            ], ApiService::$HTTP_STATUS_500);
        }
    }
}
