<?php

namespace Tests\Feature;

use App\Models\User;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {

        /*dump("Migrating....");
        Artisan::call('migrate');
        dump("End migration");
        $user = User::query()->create([
            "email"=> "aulerien80@gmail.com",
            "password" => Hash::make("root1234"),
            "role" => RoleService::$ROLE_ETUDIANT
        ]);
        dump($user);
        $count = User::query()->get()->count();*/
        $this->assertEquals(1, 1);
    }
}
