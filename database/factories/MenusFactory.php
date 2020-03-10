<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Menu::class, function (Faker $faker) {
    return [
        'title'        => $faker->sentence,
        // 'info'         => $faker->paragraph,
        'menu_image'   => 'https://www.telegraaf.nl/images/840x473/filters:format(jpeg):quality(50)/cdn-kiosk-api.telegraaf.nl/1270efe0-64d6-11e8-878c-4d7aa66accf8.jpg',
        'takeout_date' => (\Carbon\Carbon::now())->addDay()
    ];
});
