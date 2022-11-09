<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeeksMessagesTable extends Migration
{
    public function up()
    {
        Schema::create('weeks_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('week_of');
            $table->longText('message_titles');
            $table->boolean('active')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
