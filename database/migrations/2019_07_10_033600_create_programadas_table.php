<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programadas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cdocente');
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->integer('minimo')->default(1);
            $table->integer('paso');
            $table->integer('maximo');
            $table->string('type');
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
        Schema::dropIfExists('programadas');
    }
}
