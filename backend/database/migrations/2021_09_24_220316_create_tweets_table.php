<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('tweets', function (Blueprint $table) {
             $table->increments('tweet_id');
             $table->unsignedInteger('user_id')->comment('ユーザID');
             $table->string('text');
             $table->softDeletes();
             $table->timestamps();

             $table->index('user_id');
             $table->index('tweet_id');
             $table->index('text');

             $table->foreign('user_id')
                   ->references('user_id')
                   ->on('users')
                   ->onDelete('cascade')
                   ->onUpdate('cascade');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
