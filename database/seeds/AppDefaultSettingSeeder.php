<?php

use App\AppDefaultSetting;
use App\TimeSetting;
use Illuminate\Database\Seeder;

class AppDefaultSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appDefaultSett = [
        	[
        		'no_of_months_for_cal' => 1,
        	]

        ];

        $times = [
            [
                'time' => '09:00:00',
            ],
            [
                'time' => '10:00:00',
            ],
            [
                'time' => '11:00:00',
            ],
            [
                'time' => '12:00:00',
            ],
            [
                'time' => '13:00:00',
            ],
            [
                'time' => '14:00:00',
            ],
            [
                'time' => '15:00:00',
            ],
            [
                'time' => '16:00:00',
            ],
            [
                'time' => '17:00:00',
            ],
            [
                'time' => '18:00:00',
            ],
            [
                'time' => '19:00:00',
            ],
            [
                'time' => '20:00:00',
            ],
            [
                'time' => '21:00:00',
            ],
            [
                'time' => '22:00:00',
            ],
        ];

        AppDefaultSetting::insert($appDefaultSett);
        TimeSetting::insert($times);
    }
}
