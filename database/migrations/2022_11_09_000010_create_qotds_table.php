<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQotdsTable extends Migration
{
    public function up()
    {
        Schema::create('qotds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('quote')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
