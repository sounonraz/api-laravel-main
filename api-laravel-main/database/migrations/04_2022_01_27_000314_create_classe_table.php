<?php

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
        Schema::create('classe', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("niveau_id");
            $table->unsignedBigInteger("filiere_id");
            $table->unsignedBigInteger("annee_academique_id");

            $table->foreign('niveau_id')->references('id')->on('niveau');
            $table->foreign('filiere_id')->references('id')->on('filiere');
            $table->foreign('annee_academique_id')->references('id')->on('annee_academique');

            $table->unique(["niveau_id","filiere_id", "annee_academique_id"]);

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
        Schema::dropIfExists('classe');
    }
};
