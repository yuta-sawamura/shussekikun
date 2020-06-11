<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'organization_id' => 1,
        'store_id' => $faker->numberBetween($min = 1, $max = 3),
        'category_id' => $faker->numberBetween($min = 1, $max = 2),
        'sei' => $faker->lastName(),
        'mei' => $faker->firstName(),
        'gender' => $faker->numberBetween($min = 1, $max = 2),
        'email' => $faker->unique()->safeEmail(),
        'email_verified_at' => now(),
        'birth' => $faker->dateTimeThisCentury()->format('Y-m-d'),
        'role' => 9,
        'status' => $faker->numberBetween($min = 1, $max = 2),
        'remember_token' => Str::random(10),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
