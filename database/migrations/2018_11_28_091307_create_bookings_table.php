<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();
            //$table->integer('agent_id')->nullable();
            $table->integer('vehicle_id')->nullable();
            $table->string('booking_title')->nullable();
            $table->string('service_date')->nullable();
            $table->boolean('approved');
            $table->integer('vendor_id')->unsigned();
            $table->datetime('service_time')->nullable();
            $table->timestamps();
        });
        Schema::table('bookings',function ($table){
        $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(['vendor_id']);
        Schema::dropIfExists('bookings');
    }
}
