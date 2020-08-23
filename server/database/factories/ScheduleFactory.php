<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Schedule;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Schedule::class, function (Faker $faker) {
    return [
        'day' => $faker->numberBetween($min = 1, $max = 7),
        'start_at' => '20:00',
        'end_at' => '21:00',
    ];
});
