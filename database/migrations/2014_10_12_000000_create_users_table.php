<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        if(Schema::hasTable('users')){
            Schema::drop('users');
        }
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->null();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->tinyinteger('is_activated',1);
            $table->string('image_profil')->null();
            $table->string('image_profil2')->null();
            $table->string('hp')->null();
            $table->text('alamat')->null();
            $table->text('desc')->null();
            $table->integer('post')->null();
            $table->integer('follower')->null();
            $table->integer('followed')->null();
            
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
        Schema::dropIfExists('users');
    }
}
