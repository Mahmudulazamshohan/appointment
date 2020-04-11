<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailableDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('specialist_id')->nullable();
            $table->unsignedBigInteger('day_name_id');
            $table->integer('status')->default(0)->nullable();
            $table->timestamps();

            $table->foreign('specialist_id')->references('id')->on('specialists');
            $table->foreign('day_name_id')->references('id')->on('day_names');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('available_days');
    }
}
