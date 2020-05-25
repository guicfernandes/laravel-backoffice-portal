<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'subject' => $faker->sentence,
        'content' => $faker->paragraph,
        'start_date' => $faker->date,
        'expiration_date' => $faker->date,
        'change_event_date' => $faker->date,
        'active' => true,
        'employee_id' => factory('App\User')->create()->id,
    ];
});
