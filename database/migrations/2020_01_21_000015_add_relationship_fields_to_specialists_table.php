<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSpecialistsTable extends Migration
{
    public function up()
    {
        Schema::table('specialists', function (Blueprint $table) {
            $table->unsignedInteger('user_id');

            $table->foreign('user_id', 'user_fk_899200')->references('id')->on('users');

            // $table->unsignedInteger('category_id');

            // $table->foreign('category_id', 'category_fk_899201')->references('id')->on('categories');
        });
    }
}
