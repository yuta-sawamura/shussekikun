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
        'organization_id' => null,
        'store_id' => null,
        'category_id' => null,
        'sei' => $faker->lastName(),
        'mei' => $faker->firstName(),
        'sei_kana' => $faker->lastName(),
        'mei_kana' => $faker->firstName(),
        'img' => null,
        'gender' => $faker->numberBetween($min = 1, $max = 2),
        'email' => $faker->safeEmail(),
        'birth' => $faker->dateTimeThisCentury()->format('Y-m-d'),
        'role' => 3,
        'password' => bcrypt('secret'),
        'email_verified_at' => now(),
        'status' => 1,
        'remember_token' => Str::random(10),
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
