<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id()->unique();
            $table->foreignId('user_one_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('user_two_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('has_user_one_liked')->default(false);
            $table->boolean('has_user_two_liked')->default(false);;
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
        Schema::dropIfExists('matches');
    }
}
