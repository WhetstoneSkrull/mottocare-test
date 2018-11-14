<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
        //    $table->string('motto_uses');
            $table->string('vehicle_category_id');
            $table->string('vehicle_make')->nullable();
            $table->string('year')->nullable();
            $table->string('pic')->nullable();
            $table->string('model')->nullable();
            $table->string('vehicle_reg_no')->nullable();
            $table->string('chasis_no')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
