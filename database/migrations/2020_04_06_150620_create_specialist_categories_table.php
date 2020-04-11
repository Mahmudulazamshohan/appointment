<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialistCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialist_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('specialist_id');
            $table->unsignedInteger('category_id');

            $table->foreign('specialist_id')->references('id')->on('specialists');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialist_categories');
    }
}
