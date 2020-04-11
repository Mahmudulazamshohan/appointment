<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'category_create',
            ],
            [
                'id'    => '18',
                'title' => 'category_edit',
            ],
            [
                'id'    => '19',
                'title' => 'category_show',
            ],
            [
                'id'    => '20',
                'title' => 'category_delete',
            ],
            [
                'id'    => '21',
                'title' => 'category_access',
            ],
            [
                'id'    => '22',
                'title' => 'customer_create',
            ],
            [
                'id'    => '23',
                'title' => 'customer_edit',
            ],
            [
                'id'    => '24',
                'title' => 'customer_show',
            ],
            [
                'id'    => '25',
                'title' => 'customer_delete',
            ],
            [
                'id'    => '26',
                'title' => 'customer_access',
            ],
            [
                'id'    => '27',
                'title' => 'appointment_create',
            ],
            [
                'id'    => '28',
                'title' => 'appointment_edit',
            ],
            [
                'id'    => '29',
                'title' => 'appointment_show',
            ],
            [
                'id'    => '30',
                'title' => 'appointment_delete',
            ],
            [
                'id'    => '31',
                'title' => 'appointment_access',
            ],
            [
                'id'    => '32',
                'title' => 'setup_access',
            ],
            [
                'id'    => '33',
                'title' => 'frontend_setting_create',
            ],
            [
                'id'    => '34',
                'title' => 'frontend_setting_edit',
            ],
            [
                'id'    => '35',
                'title' => 'frontend_setting_show',
            ],
            [
                'id'    => '36',
                'title' => 'frontend_setting_delete',
            ],
            [
                'id'    => '37',
                'title' => 'frontend_setting_access',
            ],
            [
                'id'    => '38',
                'title' => 'reference_create',
            ],
            [
                'id'    => '39',
                'title' => 'reference_edit',
            ],
            [
                'id'    => '40',
                'title' => 'reference_show',
            ],
            [
                'id'    => '41',
                'title' => 'reference_delete',
            ],
            [
                'id'    => '42',
                'title' => 'reference_access',
            ],
            [
                'id'    => '43',
                'title' => 'specialist_create',
            ],
            [
                'id'    => '44',
                'title' => 'specialist_edit',
            ],
            [
                'id'    => '45',
                'title' => 'specialist_show',
            ],
            [
                'id'    => '46',
                'title' => 'specialist_delete',
            ],
            [
                'id'    => '47',
                'title' => 'specialist_access',
            ],
            [
                'id'    => '48',
                'title' => 'reservation_create',
            ],
            [
                'id'    => '49',
                'title' => 'reservation_edit',
            ],
            [
                'id'    => '50',
                'title' => 'reservation_show',
            ],
            [
                'id'    => '51',
                'title' => 'reservation_delete',
            ],
            [
                'id'    => '52',
                'title' => 'reservation_access',
            ],

           [
                'id'    => '53',
                'title' => 'service_create',
            ],
            [
                'id'    => '54',
                'title' => 'service_edit',
            ],
            [
                'id'    => '55',
                'title' => 'service_show',
            ],
            [
                'id'    => '56',
                'title' => 'service_delete',
            ],
            [
                'id'    => '57',
                'title' => 'service_access',
            ],

        ];

        Permission::insert($permissions);
    }
}
