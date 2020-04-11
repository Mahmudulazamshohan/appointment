<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('status')->nullable();

            $table->decimal('amount', 15, 2)->default(0)->nullable();

            $table->string('category_color')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
