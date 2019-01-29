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
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('vehicle_id')->nullable();
            $table->unsignedInteger('slot_id')->nullable();
          //  $table->unsignedInteger('service_render_id');
            $table->string('booking_no')->nullable();
            $table->date('service_date')->nullable();
            $table->time('service_time')->nullable();
            $table->boolean('is_completed')->default(false);
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
        Schema::dropIfExists('bookings');
    }
}
