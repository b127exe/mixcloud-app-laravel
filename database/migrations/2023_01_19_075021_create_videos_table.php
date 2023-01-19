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
        Schema::create('videos', function (Blueprint $table) {
            $table->id('vid');
            $table->string('title',50);
            $table->text('description');
            $table->string('video_path',150);
            $table->integer('duration');
            $table->unsignedBigInteger('album_id');
            $table->foreign('album_id')->references('album_id')->on('albums');
            $table->unsignedBigInteger('artist_id');
            $table->foreign('artist_id')->references('artist_id')->on('artists');
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
        Schema::dropIfExists('videos');
    }
};
