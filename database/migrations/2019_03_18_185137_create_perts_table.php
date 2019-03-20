<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type', 50)->nullable();
            $table-date('date')->nullable();
            $table-text('observation');
            $table->integer('bovin_id')->reference('id')->on('bovins')->after('id');
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
        Schema::dropIfExists('perts');
    }
}
