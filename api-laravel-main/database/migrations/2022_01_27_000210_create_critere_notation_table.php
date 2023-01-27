<?php

use App\Services\CritereNotationService;
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
        Schema::create('critere_notation', function (Blueprint $table) {
            $table->id();
            $table->longText('libelle');
            $table->enum('type', array_keys(CritereNotationService::getTypesCriteres()));
            $table->longText('values')->nullable(); // use a split to come on a Array
            $table->double('poids')->default(1);
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
        Schema::dropIfExists('critere_notation');
    }
};
