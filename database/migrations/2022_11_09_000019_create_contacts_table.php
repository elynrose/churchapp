<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->string('church');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('category');
            $table->longText('comment');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
