<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role_id' => rand(1,3),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Note::class, function (Faker\Generator $faker) {
    static $password;
    $models = array(
      'App\Site',
      'App\Subnet',
      'App\Equipment',
      'App\Room',
      );
    return [
        'text' => $faker->text,
        'user_id' => rand(1,10),
        'noteable_id' => rand(1,6),
        'noteable_type' => $models[rand(0,3)],
    ];
});








