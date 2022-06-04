<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('user_id')->constrained();
            $table->foreignId('author_id')->references('user_id')->on('doctors')->nullable();
            $table->foreignId('publication_category_id')->constrained();
            $table->foreignId('photo_id')->constrained();
            $table->string('title');
            $table->text('body');
            $table->boolean('status');
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
        Schema::dropIfExists('publications');
    }
}
