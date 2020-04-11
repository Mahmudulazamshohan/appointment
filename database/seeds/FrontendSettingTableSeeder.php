<?php

use Illuminate\Database\Seeder;
use App\FrontendSetting;
class FrontendSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $frontend = [
        	[
        		'id' =>1,
        		'currency' =>'$',
        		'site_title' =>'Ústav dermatopsychologie',
        		'site_email' =>'info@dermatopsychologie.cz',
        		'site_address' =>'Karlovo náměstí 1, Praha 1 lorem',
        	]

        ];

        FrontendSetting::insert($frontend);
    }
}
