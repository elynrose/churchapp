<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageLayoutsTable extends Migration
{
    public function up()
    {
        Schema::create('page_layouts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ordering')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
