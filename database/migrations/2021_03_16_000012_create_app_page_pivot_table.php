<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppPagePivotTable extends Migration
{
    public function up()
    {
        Schema::create('app_page', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id', 'page_id_fk_3446655')->references('id')->on('pages')->onDelete('cascade');
            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id', 'app_id_fk_3446655')->references('id')->on('apps')->onDelete('cascade');
        });
    }
}
