<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('cart')){
            Schema::drop('cart');
        }
        Schema::create('cart', function (Blueprint $table) {
            $table->increments('cart_id');
            $table->integer('user_id')->null();
            $table->integer('produk_id')->null();
            $table->string('produk_name')->null();
            $table->integer('produk_cart_qty');
            $table->integer('produk_price')->null();
            $table->string('produk_image_src1')->null();
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
        Schema::dropIfExists('cart');
    }
}
