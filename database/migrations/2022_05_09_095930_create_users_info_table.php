<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id()->unique();
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('phone')->unique();
            $table->string('location');
            $table->enum('gender',['Male', 'Female']);
            $table->unsignedInteger('age');
            $table->string('profile_image')->nullable();
            $table->enum('relationship',['Single', 'Complicated', 'Taken', 'Married']);
            $table->string('description',180);
            $table->enum('species',['Floppa','Capybara']);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}
