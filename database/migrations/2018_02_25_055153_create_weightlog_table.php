<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightlogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weightlog', function (Blueprint $table) {
            $table->increments('id');
            $table->date('log_date');
            $table->tinyInteger('max');
            $table->tinyInteger('min');
            $table->tinyInteger('variance');
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
        Schema::dropIfExists('weightlog');
    }
}
