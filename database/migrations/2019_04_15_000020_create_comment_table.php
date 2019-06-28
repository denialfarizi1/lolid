<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
       if(Schema::hasTable('comment')){
            Schema::drop('comment');
        }
        Schema::create('comment', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->integer('comment_user_id',50)->null();
            $table->string('comment_username',50)->null();
            $table->string('comment_email',50)->null();
            $table->text('comment_desc',255)->null();
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
        Schema::dropIfExists('comment');
    }
}
