<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sentence;
use Faker\Generator as Faker;

$factory->define(Sentence::class, function (Faker $faker) {
    return [
        'sentence' => $faker->sentence,
        'page_id' => factory(\App\Page::class)
    ];
});
