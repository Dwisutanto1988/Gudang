<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->bigInteger('stock_id')->primary();
            $table->bigInteger('user_id');
            $table->bigInteger('shelf_id');
            $table->bigInteger('product_id');
            $table->integer('tujuan_id')->nullable();
            $table->bigInteger('product_amount')->default(0);
            $table->integer('type')->default(1)->comment("0 = OUT; 1 = IN");
            $table->dateTime('datetime')->default('current_timestamp()');
            $table->bigInteger('ending_amount')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
