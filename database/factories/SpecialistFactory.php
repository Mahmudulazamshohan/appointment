<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Specialist;
use Faker\Generator as Faker;

$factory->define(Specialist::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'opening_time' => $faker->date('H:i:s', rand(1,54000)),
        'closing_time' => $faker->date('H:i:s', rand(55000,84000)),
        'recurring_day' => $faker->numberBetween($min = 1, $max = 6),
        'availability' => $faker->numberBetween($min = 1, $max = 2),
        'occupied' => $faker->date('H:i:s', rand(65000,84000)),
        'created_at' => now(),
        'updated_at' => now(),
        'user_id' => $faker->unique(true)->numberBetween(1, 30),
        'category_id' => $faker->numberBetween($min = 1, $max = 3),
    ];
});
