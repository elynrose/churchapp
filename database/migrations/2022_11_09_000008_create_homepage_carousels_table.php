<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomepageCarouselsTable extends Migration
{
    public function up()
    {
        Schema::create('homepage_carousels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('headline')->nullable();
            $table->string('sub_heading')->nullable();
            $table->string('link_to')->nullable();
            $table->integer('order');
            $table->boolean('primary')->default(0)->nullable();
            $table->boolean('active')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
