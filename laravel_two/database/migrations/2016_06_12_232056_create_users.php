<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_from_ru', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login', 45)->unique();
            $table->string('email', 45)->unique();
            $table->string('password', 60);
            $table->boolean('isAdmin');
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
        //
    }
}
