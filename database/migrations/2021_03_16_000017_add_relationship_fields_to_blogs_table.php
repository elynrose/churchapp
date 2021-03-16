<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBlogsTable extends Migration
{
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_id');
            $table->foreign('created_by_id', 'created_by_fk_3446780')->references('id')->on('users');
            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id', 'app_fk_3446781')->references('id')->on('apps');
        });
    }
}
