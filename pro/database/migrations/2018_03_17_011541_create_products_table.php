<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


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
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';
            $table->increments('product_id');
            $table->string('name');
            $table->string('price');
            $table->longText('description');
            $table->integer('cat_id');
            $table->string('image');
            $table->integer('quantity');
            $table->integer('brand_id');
            $table->longText('review');
            $table->integer('percentage_offer');
            $table->enum('rate', ['1', '2', '3', '4', '5']);
            $table->enum('p_status', ['publish', 'hidden']);
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
        Schema::dropIfExists('products');
    }
}
