<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Partner;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(Partner::class, function (Faker $faker) {
    $name = $faker->name;

    return [
        'name' => $name,
        'description' => $faker->sentence,
        'type' => Arr::random(['random', 'another_random']),
        'pic_name' => $name,
        'pic_phone' => $faker->tollFreePhoneNumber,
        'pic_email' => $faker->unique()->email,
    ];
});
