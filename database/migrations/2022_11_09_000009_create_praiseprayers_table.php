<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePraiseprayersTable extends Migration
{
    public function up()
    {
        Schema::create('praiseprayers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('select_type');
            $table->string('full_name');
            $table->string('on_behalf_of')->nullable();
            $table->longText('details');
            $table->date('date_submitted');
            $table->boolean('closed')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
