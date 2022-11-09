<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoExcerptsTable extends Migration
{
    public function up()
    {
        Schema::create('video_excerpts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('preached_by');
            $table->date('date_preached');
            $table->string('location')->nullable();
            $table->integer('ordering')->nullable();
            $table->boolean('active')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
