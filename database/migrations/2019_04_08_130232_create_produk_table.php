<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         if(Schema::hasTable('produk')){
            Schema::drop('produk');
        }
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('produk_id');
            $table->integer('user_id')->null();
            $table->string('name_user',50)->null();
            $table->integer('hp',20)->null();
            $table->text('alamat',255)->null();
            $table->integer('produk_cart')->null();
            $table->string('produk_name',50)->null();
            $table->string('hp',20)->null();
            $table->text('alamat',255)->null();
            $table->enum('produk_jenis',['ELEKTRONIK','BAJU','MAKANAN','KESEHATAN','OLAHRAGA','BUKU']);
            $table->string('produk_brand',50)->null();
            $table->string('produk_model',50)->null();
            $table->date('produk_released_on')->null();
            $table->string('produk_dimensions')->null();
            $table->string('produk_size',3)->null();
            $table->text('produk_desc');
            $table->integer('produk_qty');
            $table->integer('produk_price');
            $table->string('produk_image_src1')->null();
            $table->string('produk_image_src2')->null();
            $table->string('produk_image_src3')->null();
            $table->string('produk_video_url')->null();
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
        Schema::dropIfExists('produk');
    }
}
