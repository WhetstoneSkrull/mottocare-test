<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServiceCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('service_cars', function (Blueprint $table) {

      $table->integer('service_id')->unsigned();
      $table->integer('car_id')->unsigned();

      $table->foreign('service_id')->references('id')->on('services');
      $table->foreign('car_id')->references('id')->on('cars');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('service_cars');

    }
}
