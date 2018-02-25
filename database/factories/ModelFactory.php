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
        'name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\League::class, function (Faker\Generator $faker) {

    $leagueSize = [8,10,12,14,16];
    shuffle($leagueSize);
    $user = App\User::inRandomOrder()->first();

    return [
        'name' => 'Test ' . $faker->domainWord,
        'join_key' =>$password = bcrypt('secret'),
        'member_count' => $leagueSize[0],
        'creator_id' => $user->id
    ];
});
