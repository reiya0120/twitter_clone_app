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
      Schema::create('users', function (Blueprint $table) {
          $table->increments('user_id');
          $table->string('screen_name')->unique()->nullable(false)->comment('アカウント名');
          $table->string('name')->nullable(false)->comment('ユーザ名');
          $table->string('profile_image')->nullable()->comment('プロフィール画像');
          $table->string('password');
          $table->rememberToken();
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
