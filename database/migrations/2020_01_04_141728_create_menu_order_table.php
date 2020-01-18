<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('menu_id')->unsigned();
            $table->BigInteger('order_id')->unsigned();
            $table->Integer('quantity')->unsigned();

            $table->unique(['menu_id', 'order_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_order');
    }
}
