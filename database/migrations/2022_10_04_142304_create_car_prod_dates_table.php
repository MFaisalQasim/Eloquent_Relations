<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarProdDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_prod_dates', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('car_model_id');
            $table->date('date')->nullable();
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
        Schema::drop('car_prod_dates');
    }
}
