<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traces', function (Blueprint $table) {
            $table->increments('id');
            $table->text('cdocente',6)->nullable();
            $table->integer('docente_id')->nullable();
            $table->text('change',20)->nullable();
            $table->integer('user_change')->nullable();
            $table->boolean('send')->default(false);
            $table->integer('user_send')->nullable();
            $table->boolean('read')->default(false);
            $table->integer('user_read')->nullable();
            $table->boolean('reply')->default(false);
            $table->integer('user_reply')->nullable();
            $table->boolean('confirm')->default(false);
            $table->integer('user_confirm')->nullable();
            $table->boolean('closed')->default(false);
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
        Schema::dropIfExists('traces');
    }
}
