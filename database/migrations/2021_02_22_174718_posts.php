<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       

        if (!Schema::hasTable('posts')) {
            Schema::create('posts', function (Blueprint $table){
                $table->increments('id');
                // slug is a URL friendly version of the title
                // if slug is null it will be auto generated from the title and default 
                $table->string('slug')->nullable() ->default(null);
                $table->string('title');
                $table->longText('description');
                $table->string('image_path');
                $table->timestamps();
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
