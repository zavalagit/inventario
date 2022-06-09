<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaKitMarcador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kit_marcador', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('kit_id');
            $table->foreign('kit_id')->references('id')->on('kits')->onDelete('cascade');
            $table->unsignedInteger('marcador_id');
            $table->foreign('marcador_id')->references('id')->on('marcadores')->onDelete('cascade');
            $table->unsignedInteger('orden')->default(0);
            $table->timestamps();

            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kit_marcador');
    }
}
