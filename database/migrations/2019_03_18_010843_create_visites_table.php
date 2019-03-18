<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 20)->nullable();
            $table->date('date')->nullable();
            $table->decimal('prix')->nullable();
            $table->text('observation')->nullable();
            $table->integer('bovin_id')->unsigned();
            $table->foreign('bovin_id')->references('id')->on('bovins')->onDelete('cascade');
            $table->integer('veterinaire_id')->unsigned();
            $table->foreign('veterinaire_id')->references('id')->on('veterinaires')->onDelete('cascade');
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
        Schema::dropIfExists('visites');
    }
}
