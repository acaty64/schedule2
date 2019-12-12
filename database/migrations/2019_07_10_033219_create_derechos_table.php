<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDerechosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('derechos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cdocente');
            $table->string('periodo');
            $table->integer('dias');
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
        Schema::table('derechos', function (Blueprint $table) {
            Schema::dropIfExists('derechos');
        });
    }
}
