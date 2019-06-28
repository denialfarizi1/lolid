<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       if(Schema::hasTable('post')){
            Schema::drop('post');
        }
        Schema::create('post', function (Blueprint $table) {
            $table->increments('post_id');
            $table->integer('post_user_id',50)->null();
            $table->string('post_username',50)->null();
            $table->string('post_email',50)->null();
            $table->text('post_alamat',255)->null();
            $table->text('post_status',255)->null();
            $table->string('image_post',255)->null();
            $table->string('post_comment_id',20)->null();
            $table->integer('post_like',50)->null();
            $table->integer('post_unlike',50)->null();
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
        Schema::dropIfExists('post');
    }
}
