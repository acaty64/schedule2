<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tmail_id');
            $table->string('from');
            $table->string('to');
            $table->string('view');
            $table->dateTime('limit_date');
            $table->string('cc1')->nullable();
            $table->string('cc2')->nullable();
            $table->dateTime('send_date')->nullable();
            $table->dateTime('reply_date')->nullable();
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
        Schema::dropIfExists('mails');
    }
}