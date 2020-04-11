<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialistsTable extends Migration
{
    public function up()
    {
        Schema::create('specialists', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description')->nullable();
            $table->time('opening_time');
            $table->time('closing_time')->nullable();
            $table->string('photo')->nullable();
            $table->string('availability')->nullable();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    public function down()
    {
        if (Schema::hasColumn('specialists', 'specialist_id'))
                {
                    Schema::table('specialists', function (Blueprint $table)
                    {
                        $table->dropColumn('specialist_id');
                    });
                }
    }
}
