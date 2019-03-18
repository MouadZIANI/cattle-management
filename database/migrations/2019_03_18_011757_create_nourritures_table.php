<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNourrituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nourritures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qte')->default(0);
            $table->integer('bovin_id')->unsigned();
            $table->foreign('bovin_id')->references('id')->on('bovins')->onDelete('cascade');
            $table->integer('element_id')->unsigned();
            $table->foreign('element_id')->references('id')->on('stock_elements')->onDelete('cascade');
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
        Schema::dropIfExists('nourritures');
    }
}
