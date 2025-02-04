<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->longText('description')->nullable();

            $table->string('display_category')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}