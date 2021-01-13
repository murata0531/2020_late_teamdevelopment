<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalklogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talklogs', function (Blueprint $table) {
            $table->id();
            $table->integer('talk_id')->unique();
            $table->integer('user_id')->unique();
            $table->datetime('date');
            $table->string('message');
            $table->timestamps();

            $table->foreign('talk_id')->references('id')->on('talks');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unique(['user_id','talk_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talklogs');
    }
}
