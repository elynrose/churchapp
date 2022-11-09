<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivesTable extends Migration
{
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('location')->nullable();
            $table->string('language');
            $table->string('name');
            $table->date('date_preached');
            $table->boolean('published')->default(0)->nullable();
            $table->string('video_url')->nullable();
            $table->string('audio_url')->nullable();
            $table->string('pdf_file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
