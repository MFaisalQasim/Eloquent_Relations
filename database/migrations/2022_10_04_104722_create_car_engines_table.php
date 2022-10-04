<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarEnginesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_engines', function (Blueprint $table) {
            $table->increments('id');
            $table->string('engine_model');
            $table->unsignedInteger('car_model_id');
            $table->string('name')->nullable();
            $table->longText('details')->nullable();
            $table->timestamps();
            $table->foreign('car_model_id')->references('id')->on('car_models')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('car_engines');
    }
}
