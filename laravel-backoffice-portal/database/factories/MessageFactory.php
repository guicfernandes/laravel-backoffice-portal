<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    $date = $faker->dateTimeBetween('now', '+30 years');
    $date_faker = $date->format("d-m-Y");
    return [
        'subject' => $faker->sentence,
        'content' => $faker->paragraph,
        'start_date' => $date_faker,
        'expiration_date' => $date_faker,
        'change_event_date' => $faker->date,
        'active' => true,
        'employee_id' => factory('App\User')->create()->id,
    ];
});
