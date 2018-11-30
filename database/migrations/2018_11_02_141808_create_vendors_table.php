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
           $table->integer('user_id');
           $table->string('vendor_id');

           //Vendor Manager details
           $table->string('vendor_title');
           $table->string('vendor_first_name');
           $table->string('vendor_last_name');
           $table->string('vendor_logo')->default('public/images/vendor.jpg');
           $table->string('vendor_email');
           $table->integer('mobile_no');
        //   $table->string('email');
//           $table->string('password');
           $table->string('manager_first_name')->nullable();
           $table->string('manager_last_name')->nullable();
           $table->string('manager_email')->nullable();


           //Vendor Mechanic details
           $table->string('mechanic_first_name')->nullable();
           $table->string('mechanic_last_name')->nullable();
           $table->string('mechanic_nationality')->nullable();
           $table->string('mechanic_dob')->nullable();
           $table->integer('mechanic_contact_no')->nullable();
           $table->string('mechanic_email')->nullable();
           $table->string('mechanic_image')->nullable();

           //Vendor Business details
           $table->string('address')->nullable();
           $table->string('state')->nullable();
           $table->string('city')->nullable();
           $table->string('lga')->nullable();
           $table->integer('capacity')->nullable();
           $table->time('opening_time')->nullable();
           $table->time('closing_time')->nullable();
           $table->string('off_day')->nullable();
           $table->string('membership')->nullable();
          //  $table->integer('engine_id')->nullable();
        //    $table->integer('automobile_id')->nullable();
          // $table->string('manpower')->nullable();
           $table->integer('lumpsum')->nullable();
           $table->string('status')->nullable();
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
