<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSecuenciasvalores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secuenciasvalores', function (Blueprint $table) {
            $table->unsignedInteger('str_id');
            $table->foreign('str_id')->references('id')->on('strs')->onDelete('cascade');
            $table->unsignedInteger('marcador_id');
            $table->foreign('marcador_id')->references('id')->on('marcadores')->onDelete('cascade');
            $table->string('valor', 50)->nullable();
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
        Schema::dropIfExists('secuenciasvalores');
    }
}
