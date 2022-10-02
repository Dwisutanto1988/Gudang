<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigInteger('product_id')->primary();
            $table->bigInteger('user_id');
            $table->bigInteger('product_code');
            $table->string('product_name');
            $table->decimal('purchase_price', 11, 2);
            $table->decimal('sale_price', 11, 2);
            $table->bigInteger('category_id')->nullable();
            $table->integer('tujuan_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
