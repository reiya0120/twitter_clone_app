<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('followers', function (Blueprint $table) {
             $table->unsignedInteger('following_id');
             $table->unsignedInteger('followed_id');

             $table->unique([
               'following_id',
               'followed_id'
             ]);

             $table->foreign('following_id')
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
        Schema::dropIfExists('followers');
    }
}
