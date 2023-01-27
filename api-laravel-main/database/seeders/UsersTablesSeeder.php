<?php

namespace Database\Seeders;

use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsersTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => "admin@admin.com",
            'name' => "Admin",
            'password' => '$2y$10$VXwMW4hpeKtdlCNDhANMtuHKaf59Td1ipST6GPKIBP5WqnCmLdUyC',
            'role' => RoleService::$ROLE_ADMIN,
        ]);
    }
}
