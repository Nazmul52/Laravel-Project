<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('comments', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->timestamps();
        // });
         Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('comment_body');
            $table->string('commentable_type');
            $table->string('url', 255)->nullable();
           
            $table->integer('user_id')->unsigned();
            $table->integer('commentable_id')->unsigned();
         
            $table->foreign('user_id')->references('id')->on('users');
          
            $table->foreign('commentable_id')->references('comment_id')->on('projects');
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
        Schema::dropIfExists('comments');
    }
}