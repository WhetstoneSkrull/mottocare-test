<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('agent_first_name')->nullable();
            $table->string('agent_last_name')->nullable();
            $table->string('agent_email')->nullable();
            $table->string('agent_category');
            $table->string('agent_pic');
            $table->string('commission');
            $table->string('deposits')->nullable();
            $table->string('state')->nullable();
            $table->string('lga')->nullable();
            $table->string('target')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('agents');
    }
}
