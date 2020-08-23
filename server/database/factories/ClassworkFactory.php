<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Classwork;
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

$factory->define(Classwork::class, function (Faker $faker) {
    return [
        'name' => '上級',
    ];
});
