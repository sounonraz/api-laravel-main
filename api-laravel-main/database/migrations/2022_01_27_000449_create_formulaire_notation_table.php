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
        Schema::create('formulaire_notation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("classe_id");
            $table->unsignedBigInteger("matiere_id");
            $table->unsignedBigInteger("enseignant_id");
            $table->longText("code");

            $table->foreign('classe_id')->references('id')->on('classe');
            $table->foreign('matiere_id')->references('id')->on('matiere');
            $table->foreign('enseignant_id')->references('id')->on('enseignant');
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
        Schema::dropIfExists('formulaire_notation');
    }
};
