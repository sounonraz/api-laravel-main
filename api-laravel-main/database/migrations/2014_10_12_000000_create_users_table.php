<?php

use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', array_keys(RoleService::getRoles()));
            $table->unsignedBigInteger("classe_id")->nullable();
            $table->longText('qrcode')->nullable();
            $table->enum('status',  array_keys(UserService::getUserStatus()))->default(UserService::$USER_STATUS_ACTIF);

            $table->foreign('classe_id')->references('id')->on('classe');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
};
