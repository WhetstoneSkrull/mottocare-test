<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_renders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
          //  $table->integer('vendor_id')->unsigned()->nullable();
            $table->integer('service_category_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('price');
            $table->text('description')->nullable();
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
      //Schema::dropForeign(['vendor_id']);
        Schema::dropIfExists('service_renders');
    }
}
