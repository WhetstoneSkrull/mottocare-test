<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BookingsServiceRendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bookings_service_renders', function (Blueprint $table) {

      $table->integer('booking_id')->unsigned();
      $table->integer('service_render_id')->unsigned();

      $table->foreign('booking_id')->references('id')->on('bookings');
      $table->foreign('service_render_id')->references('id')->on('service_renders');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('bookings_service_renders');

    }
}
