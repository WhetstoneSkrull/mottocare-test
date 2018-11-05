<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('slug');
            $table->string('password');
            $table->string('mobile_no')->nullable();
            $table->string('account_pic')->default('public/images/customer.jpg');
            $table->string('driver_license')->nullable();
            $table->string('DoB')->nullable();
            $table->string('address')->nullable();
            $table->string('driver_first_name')->nullable();
            $table->string('driver_last_name')->nullable();
            $table->string('license_no')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
