<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories=[
        [
        	'id' => 1,
        	'name' => 'psychology',
            'category_color' => '#40BAEB',
        ],

        [
        	'id' => 2,
        	'name' => 'stress management',
            'category_color' => '#40BAEB',
        ],
        [
        	'id' => 3,
        	'name' => 'accupuncture',
            'category_color' => '#40BAEB',
        ],
        
        ];

        Category::insert($categories);
    }
}
