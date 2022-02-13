<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_datas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('patient_category_id')->constrained();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('address', 100);
            $table->integer('phone_number');
            $table->string('email', 50)->unique();
            $table->integer('registered_at')->nullable();
            $table->integer('last_visit')->nullable();
            $table->integer('is_active')->default(0);
            $table->integer('is_approved')->nullable();
            $table->integer('is_blocked')->nullable();
            $table->timestamps();

            

        });

        // Schema::table('user_datas', function($table)
        // {
        //     $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //     $table->foreign('patient_category_id')->references('id')->on('patient_categories')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_datas');
    }
}
