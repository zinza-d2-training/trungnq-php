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
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->unsignedBigInteger('user_id');
            $table->foreign("user_id")->references('id')->on('users')->onDelete('cascade');
            $table->integer('status');
            $table->tinyInteger('pin')->default(0);
            $table->unsignedBigInteger('topic_id');
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->foreign("topic_id")->references('id')->on('topics')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
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
