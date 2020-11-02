<?php

use Faker\Generator as Faker;




$factory->define(App\Addresses::class, function (Faker\Generator $faker) {
    return [
      'storeNumber' => $faker->integer(214),
      'address_id' => $faker->integer(1),
      'site_id' => $faker->integer(1),
      'lat' => $faker->float(53.286706),
      'lon' => $faker->float(-6.371848),
      'cfsFlag_id' => $faker->integer(1)
    ];
});
