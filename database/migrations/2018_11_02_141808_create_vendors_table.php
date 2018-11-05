<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
          //  $table->string('vendor_type');
           $table->string('vendor_first_name');
           $table->string('vendor_last_name');
           $table->string('mobile_no');
           $table->string('email');
           $table->string('password');
           $table->string('manager_first_name')->nullable();
           $table->string('manager_last_name')->nullable();
           $table->string('manager_email')->nullable();
           $table->string('mechanic_first_name')->nullable();
           $table->string('mechanic_last_name')->nullable();
           $table->string('mechanic_nationality')->nullable();
           $table->string('mechanic_dob')->nullable();
           $table->string('mechanic_contact_no')->nullable();
           $table->string('mechanic_email')->nullable();
           $table->string('mechanic_image')->nullable();
           $table->string('address')->nullable();
           $table->string('state')->nullable();
           $table->string('city')->nullable();
           $table->string('lga')->nullable();
           $table->string('capacity')->nullable();
           $table->string('opening_time')->nullable();
           $table->string('closing_time')->nullable();
           $table->string('off_day')->nullable();
           $table->string('membership')->nullable();
           $table->string('lumpsum')->nullable();
           $table->string('status_id')->nullable();
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
        Schema::dropIfExists('vendors');
    }
}
