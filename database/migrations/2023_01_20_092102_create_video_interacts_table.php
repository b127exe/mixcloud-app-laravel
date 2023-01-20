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
        Schema::create('video_interacts', function (Blueprint $table) {
            $table->id("vinteract_id");
            $table->boolean('video_like')->default(0);
            $table->string('review',100);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('uid')->on('users');
            $table->unsignedBigInteger('video_id');
            $table->foreign('video_id')->references('vid')->on('videos');
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
        Schema::dropIfExists('video_interacts');
    }
};
