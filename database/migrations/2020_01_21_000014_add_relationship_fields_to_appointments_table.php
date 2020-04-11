<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->unsignedInteger('customer_id')->nullable();

            $table->foreign('customer_id', 'customer_fk_894257')->references('id')->on('customers');

            $table->unsignedInteger('specialist_id')->nullable();

            $table->foreign('specialist_id', 'specialist_fk_894540')->references('id')->on('users');
        });
    }
}
