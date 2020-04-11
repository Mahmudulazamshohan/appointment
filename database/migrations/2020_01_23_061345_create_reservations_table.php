<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->decimal('amount', 15, 2)->nullable();

            $table->string('footer_note')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}