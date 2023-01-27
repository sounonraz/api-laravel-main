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
        Schema::create('ligne_notation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("notation_id");
            $table->unsignedBigInteger("critere_notation_id");
            $table->longText("reponse")->nullable();

            $table->foreign('notation_id')->references('id')->on('notation');
            $table->foreign('critere_notation_id')->references('id')->on('critere_notation');

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
        Schema::dropIfExists('ligne_notation');
    }
};
