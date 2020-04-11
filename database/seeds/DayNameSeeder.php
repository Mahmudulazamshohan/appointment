<?php

use App\DayName;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DayNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            [
                'id'    => 1,
                'name' => 'Monday',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 2,
                'name' => 'Tuesday',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 3,
                'name' => 'Wednesday',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 4,
                'name' => 'Thursday',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 5,
                'name' => 'Friday',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 6,
                'name' => 'Saturday',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id'    => 7,
                'name' => 'Sunday',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DayName::insert($days);
    }
}
