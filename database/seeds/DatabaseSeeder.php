<?php

use App\AppDefaultSetting;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        
        $this->call([
            DayNameSeeder::class,
            AppDefaultSettingSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            CategoryTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            FrontendSettingTableSeeder::class,
            //SpecialistsTableSeeder::class,
        ]);
    }
}
