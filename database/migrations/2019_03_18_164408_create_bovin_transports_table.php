<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBovinTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bovin_transports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bovin_id')->unsigned();
            $table->foreign('bovin_id')->references('id')->on('bovins')->onDelete('cascade');
            $table->integer('transport_id')->unsigned();
            $table->foreign('transport_id')->references('id')->on('transports')->onDelete('cascade');
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
        Schema::dropIfExists('bovin_transports');
    }
}
