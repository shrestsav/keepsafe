<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\JobEvent::class, function (Faker $faker) {
    return [
        'job_id' => $faker->numberBetween($min = 1, $max = 6),
		'priority' => $faker->numberBetween($min = 1, $max = 6),
		'superslip' => $faker->numberBetween($min = 0, $max = 1),
		'date' => $faker->date,
		'status' => $faker->numberBetween($min = 1, $max = 6),
		'type' => $faker->numberBetween($min = 1, $max = 6),
		'vehicle' => $faker->numberBetween($min = 1, $max = 6),
		'boom_lift_req' => $faker->numberBetween($min = 0, $max = 1),
		'ref' => $faker->word,
    ];
});
