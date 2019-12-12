<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('trole_id')->default(2);
            $table->foreign('trole_id')->references('id')->on('troles')->onDelete('cascade');

            $table->string('cdocente')->nullable();

            $table->unsignedBigInteger('facultad_id')->nullable();

            $table->unsignedBigInteger('sede_id')->nullable();
            
            $table->boolean('swcierre')->default(false);
            
            $table->boolean('disp_id')->default(0);
            $table->boolean('dhora')->default(false);
            $table->boolean('dcurso')->default(false);
            
            $table->boolean('carga_id')->default(0);
            $table->boolean('carga')->default(false);
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
        Schema::dropIfExists('roles');
    }
}
