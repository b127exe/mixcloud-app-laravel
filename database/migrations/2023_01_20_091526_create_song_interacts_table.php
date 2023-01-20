<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song_interacts', function (Blueprint $table) {
            $table->id("sinteract_id");
            $table->boolean('song_like')->default(0);
            $table->string('review',100);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('uid')->on('users');
            $table->unsignedBigInteger('song_id');
            $table->foreign('song_id')->references('sid')->on('songs');
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
        Schema::dropIfExists('song_interacts');
    }
};
