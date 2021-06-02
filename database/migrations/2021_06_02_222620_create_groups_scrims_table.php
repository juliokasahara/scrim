<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsScrimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_scrim', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_scrim')->unsigned();
            $table->foreign('id_scrim')->references('id')->on('scrims');
            $table->unsignedBigInteger('id_group')->unsigned();
            $table->foreign('id_group')->references('id')->on('groups');
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
        Schema::dropIfExists('group_scrim');
    }
}
