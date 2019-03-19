<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeColumnsToPertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perts', function (Blueprint $table) {
            $table->string('type', 50)->nullable();
            $table->date('date', 50)->nullable();
            $table->text('observation')->nullable();
            $table->integer('bovin_id')->unsigned()->nullable();
            $table->foreign('bovin_id')->references('id')->on('bovins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perts', function (Blueprint $table) {
            //
        });
    }
}
