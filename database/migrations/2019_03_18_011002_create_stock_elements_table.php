<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_elements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designation', 50)->nullable();
            $table->string('type', 50)->nullable()->comment('Nouritures, mediaments ...');
            $table->integer('qte')->default(0);
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
        Schema::dropIfExists('stock_elements');
    }
}
