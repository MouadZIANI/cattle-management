<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBovinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bovins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num')->unique();
            $table->string('sexe')->default('H');
            $table->decimal('prix')->nullable();
            $table->decimal('poids_initial')->nullable();
            $table->decimal('age_initial')->nullable();
            $table->string('origine')->nullable();
            $table->string('statut')->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('bovins')->onDelete('cascade');
            $table->integer('achat_id')->unsigned()->nullable();
            $table->foreign('achat_id')->references('id')->on('achats')->onDelete('cascade');
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
        Schema::dropIfExists('bovins');
    }
}
