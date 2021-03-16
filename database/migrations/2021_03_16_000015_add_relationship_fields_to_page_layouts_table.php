<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPageLayoutsTable extends Migration
{
    public function up()
    {
        Schema::table('page_layouts', function (Blueprint $table) {
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id', 'page_fk_3446695')->references('id')->on('pages');
            $table->unsignedBigInteger('module_id');
            $table->foreign('module_id', 'module_fk_3446696')->references('id')->on('modules');
        });
    }
}
