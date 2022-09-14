<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaEventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('tipo', 50);
            $table->string('cargo_1', 200)->nullable();
            $table->string('entrega', 250)->nullable();
            $table->string('cargo_2', 200)->nullable();
            $table->string('recibe', 250)->nullable();

            $table->unsignedInteger('unidad_id')->nullable();
            $table->foreign('unidad_id')->references('id')->on('unidades')->onDelete('cascade');
            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
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
        Schema::dropIfExists('eventos');
    }
}
