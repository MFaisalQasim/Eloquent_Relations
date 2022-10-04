<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_owners', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('car_id');
            $table->timestamps();
            $table->string('name')->nullable();
            $table->longText('des')->nullable();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('car_owners');
    }
}
