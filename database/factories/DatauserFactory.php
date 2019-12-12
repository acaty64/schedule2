<?php

use Faker\Generator as Faker;

$factory->define(App\DataUser::class, function (Faker $faker) {
    $wdoc1 = $faker->firstname;
    $wdoc2 = $faker->lastname;
    $wdoc3 = $faker->lastname;
    return [
        'wdoc1' => $wdoc1,
        'wdoc2' => $wdoc2,
        'wdoc3' => $wdoc3,    
        // 'cdocente' => str_pad($this->user_id, 6, '0', STR_PAD_RIGHT),
        'cdocente' => $faker->randomNumber($nbDigits = 6, $strict = false),
        'fono1' => $faker->randomNumber($nbDigits = 9, $strict = false),
        'fono2' => $faker->randomNumber($nbDigits = 9, $strict = false),
        'email1' => $faker->email,
        'email2' => $faker->email,
    ];
});
