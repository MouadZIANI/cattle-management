<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdonnancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonnanes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medicament_id')->unsigned();
            $table->foreign('medicament_id')->references('id')->on('stock_elements')->onDelete('cascade');
            $table->integer('visite_id')->unsigned();
            $table->foreign('visite_id')->references('id')->on('visites')->onDelete('cascade');
            $table->decimal('qte')->nullable();
            $table->string('posologie')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('ordonnanes');
    }
}
