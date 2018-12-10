<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('driver_first_name');
            $table->string('driver_last_name');
            $table->string('driver_dob');
            $table->string('driving_license_no');
            $table->string('driving_license_expiry_date');
            $table->integer('contact_no');
            $table->string('email')->nullable();
            $table->string('license_pic')->nullable();
            $table->string('driver_pic')->nullable();
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
        Schema::dropIfExists('drivers');
    }
}
