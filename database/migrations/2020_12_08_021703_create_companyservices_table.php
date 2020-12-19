<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companyservices', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->unique();
            $table->tinyInteger('task')->default(1);
            $table->tinyInteger('talk')->default(1);
            $table->tinyInteger('note')->default(1);
            $table->tinyInteger('file')->default(1);
            $table->tinyInteger('report')->default(1);

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
        Schema::dropIfExists('companyservices');
    }
}
