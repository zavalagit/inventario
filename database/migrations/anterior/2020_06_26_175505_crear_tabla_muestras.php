<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaMuestras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muestras', function (Blueprint $table) {
            
            $table->dateTime('fecha_muestra')->nullable();
            $table->timestamp('fecha_captura')->nullable();
            $table->string('muestra', 30)->nullable();
            $table->string('Nombre', 120)->nullable();
            $table->string('Nota', 220)->nullable();
            $table->increments('id');
            
            //key foranea del kit
            $table->integer('kit')->unsigned()->nullable();
            $table->foreign('kit')
           ->references('id')->on('kit')
           ->onDelete('cascade');

            $table->tinyInteger('identificado')->nullable();
            $table->tinyInteger('ultima_modifica')->nullable();

            //key foranea del grupo
            $table->integer('grupo')->unsigned()->nullable();
            $table->foreign('grupo')
            ->references('id')->on('grupos')
            ->onDelete('cascade');

            //key foranea del estado
            $table->integer('estado')->unsigned()->nullable();
            $table->foreign('estado')
            ->references('id')->on('estados')
            ->onDelete('cascade');

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
        Schema::dropIfExists('muestras');
    }
}
