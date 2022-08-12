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
        Schema::create('academicas', function (Blueprint $table) {
            $table->id();
            $table->string('instituicao', 200);
            $table->string('curso', 150);
            $table->date('inicio');
            $table->date('final')->nullable();
            $table->foreignId('candidatos_id');   
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
        Schema::dropIfExists('academicas');
    }
};
