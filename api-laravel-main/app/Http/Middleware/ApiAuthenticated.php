<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Services\ApiService;
use App\Services\AuthService;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class ApiAuthenticated extends Middleware {

    public function handle($request, Closure $next, ...$guards){
        if(!Auth::guard('api')->check()) {
            return response()->json([
                'message' => ApiService::$MESSAGE_NOT_AUTHENTICATED,
            ], ApiService::$HTTP_STATUS_403);
        }
        return $next($request);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
           // return route('login');
            return response()->json([
                'message' => ApiService::$MESSAGE_NOT_AUTHENTICATED,
                ], ApiService::$HTTP_STATUS_403);
        }
    }
}

