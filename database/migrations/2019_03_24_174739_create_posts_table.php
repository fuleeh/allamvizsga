<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->foreignId('user_id')->constrained();
            $table->integer('content_category_id')->unsigned()->index();
            $table->integer('photo_id')->index();
            $table->string('title');
            $table->string('body');
            $table->timestamps();

        });

        // Schema::table('posts', function(Blueprint $table)
        // {
        //     $table->foreignId('user_id')->constrained();
        //     //$table->foreign('content_category_id')->references('id')->on('content_categories')->onDelete('cascade');
        // });
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
