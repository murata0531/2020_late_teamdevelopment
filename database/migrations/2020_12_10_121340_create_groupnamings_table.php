<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupnamingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupnamings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('talk_id')->unique();
            $table->string('icon')->default('../icon/default.png');
            $table->string('name');
            $table->timestamps();

            $table->foreign('talk_id')->references('id')->on('talks');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groupnamings');
    }
}
