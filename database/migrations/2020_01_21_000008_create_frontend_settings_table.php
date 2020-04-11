<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('frontend_settings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('currency')->nullable();

            $table->string('site_title')->nullable();

            $table->string('site_email')->nullable();

            $table->string('site_address')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
