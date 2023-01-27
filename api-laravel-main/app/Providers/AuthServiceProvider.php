<?php

namespace App\Providers;

use App\Services\AuthService;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Passport/OAuth
        Passport::routes();
        Passport::tokensExpireIn(Carbon::now()->addDays(AuthService::$TOKEN_EXPIRE_IN));
        Passport::refreshTokensExpireIn(Carbon::now()->addDays(AuthService::$REFRESH_TOKEN_EXPIRE_IN));
    }
}
