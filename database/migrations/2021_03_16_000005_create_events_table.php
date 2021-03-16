<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->date('event_date')->nullable();
            $table->time('event_time');
            $table->string('event_address')->nullable();
            $table->boolean('published')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
