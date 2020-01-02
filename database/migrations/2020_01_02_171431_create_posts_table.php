<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255)->unique();
            $table->text('content')->nullable();
            $table->string('short_desc')->nullable();
            $table->string('image')->nullable();
            $table->dateTime('publish_date')->nullable();
            $table->string('slug', 255)->unique();
            $table->integer('highlight')->default(0);
            $table->integer('views')->default(0);
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('cate_id');
            $table->unsignedBigInteger('user_id');
            
            $table->timestamps();

            $table->foreign('cate_id')
                  ->references('id')->on('categories')
                  ->onDelete('cascade');
            $table->foreign('user_id')
                  ->references('id')->on('admins')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
