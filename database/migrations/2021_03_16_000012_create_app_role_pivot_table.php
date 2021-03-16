<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppRolePivotTable extends Migration
{
    public function up()
    {
        Schema::create('app_role', function (Blueprint $table) {
            $table->unsignedBigInteger('app_id');
            $table->foreign('app_id', 'app_id_fk_3446703')->references('id')->on('apps')->onDelete('cascade');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id', 'role_id_fk_3446703')->references('id')->on('roles')->onDelete('cascade');
        });
    }
}
