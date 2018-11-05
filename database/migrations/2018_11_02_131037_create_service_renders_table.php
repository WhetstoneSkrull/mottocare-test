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
            $table->integer('vendor_id');
            $table->integer('service_category_id');
            $table->integer('service_id');
            $table->integer('engine_id');
            $table->integer('automobile_id');
            $table->string('capacity');
            $table->string('manpower');
            $table->text('description');
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
        Schema::dropIfExists('service_renders');
    }
}
