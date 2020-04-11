<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->date('booking_date');
            $table->time('booking_time');
            $table->string('status')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
