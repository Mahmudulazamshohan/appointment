<?php

use Illuminate\Database\Seeder;

class SpecialistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Specialist', 30)->create();
    }
}
