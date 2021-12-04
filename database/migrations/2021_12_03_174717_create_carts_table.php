<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //isn't CART = TRANSACTION_DETAIL?
        Schema::create('carts', function (Blueprint $table) {
            // $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('user')->on('id')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('products')->on('id')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('quantity');
            $table->integer('subtotal');
            $table->integer('total');
            $table->boolean('status');
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
        Schema::dropIfExists('carts');
    }
}
