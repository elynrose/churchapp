<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_name');
            $table->longText('meta_content')->nullable();
            $table->longText('keywords')->nullable();
            $table->longText('global_css')->nullable();
            $table->longText('global_js')->nullable();
            $table->boolean('maintainance_mode')->default(0)->nullable();
            $table->longText('maintainance_message')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
