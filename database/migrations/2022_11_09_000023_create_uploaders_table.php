<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadersTable extends Migration
{
    public function up()
    {
        Schema::create('uploaders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('date_preached');
            $table->string('preached_by');
            $table->string('location')->nullable();
            $table->string('file_code')->unique();
            $table->string('coconut_job_code')->nullable();
            $table->boolean('processed')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
