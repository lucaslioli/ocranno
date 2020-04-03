<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    return [
        'file_name' => $faker->mimeType.'.pdf',
        'words_number' => $faker->randomNumber($nbDigits = 3),
        'wrong_words' => $faker->randomDigit,
        'year' => $faker->year($max = 'now'),
        'annotations' => 0
        // 'user_id' => factory(\App\User::class)
    ];
});
