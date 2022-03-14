<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //1
        Schema::table('vung_miens', function (Blueprint $table) {
            //$table->unsignedBigInteger('dia_danh_id');
            //$table->foreign('dia_danh_id')->references('id')->on('dia_danhs');
        });
        //2
        Schema::table('nhu_caus', function(Blueprint $table){
            //$table->unsignedBigInteger('dia_danh_id');
            $table->foreign('dia_danh_id')->references('id')->on('dia_danhs');
        });
        //3
        //4
        // chưa tạo bảng
        Schema::table('dia_danhs', function(Blueprint $table){
            //$table->unsignedBigInteger('post_id');
            //$table->unsignedBigInteger('user_id');
            // $table->foreign('post_id')->references('id')->on('posts');
            // $table->foreign('user_id')->references('id')->on('users');
            //$table->foreign('danh_muc_id')->constrained('danh_muc');
        });
        //5
        Schema::table('dislikes', function(Blueprint $table){
            //$table->unsignedBigInteger('post_id');
            //$table->unsignedBigInteger('user_id');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('user_id')->references('id')->on('users');
        });
        //6
        Schema::table('likes', function(Blueprint $table){
            //$table->unsignedBigInteger('post_id');
           // $table->unsignedBigInteger('user_id');
            // $table->foreign('post_id')->references('id')->on('posts');
            // $table->foreign('user_id')->references('id')->on('users');
        });
        //7
        Schema::table('danh_gias', function(Blueprint $table){
            //$table->unsignedBigInteger('post_id');
            //$table->unsignedBigInteger('user_id');
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('user_id')->references('id')->on('users');
        });
        //8
        Schema::table('comments', function(Blueprint $table){
            //$table->unsignedBigInteger('post_id');
            //$table->unsignedBigInteger('user_id');
            // $table->foreign('post_id')->references('id')->on('posts');
            // $table->foreign('user_id')->references('id')->on('users');
        });
        //9
        Schema::table('posts', function(Blueprint $table){
            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->unsignedBigInteger('diadanhid');
            // $table->foreign('diadanhid') -> references('id')->on('dia_danhs');
        });
        //10
        Schema::table('luot_xems', function(Blueprint $table){
            //$table->unsignedBigInteger('user_id');
            //$table->unsignedBigInteger('post_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('post_id')->references('id')->on('posts');
        });
        //11
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vung_miens', function (Blueprint $table) {
            //
        });
    }
}
