<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFraisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 50)->nullable();
            $table->decimal('montant')->nullable();
            $table->date('date')->nullable();
            $table->text('observation')->nullable();
            $table->integer('bovin_id')->unsigned()->nullable();
            $table->foreign('bovin_id')->references('id')->on('bovins')->onDelete('cascade');
            $table->integer('model_id')->unsigned()->nullable()->comment('Transport, Achat ...');
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
        Schema::dropIfExists('frais');
    }
}
