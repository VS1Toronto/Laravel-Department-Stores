<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Store::class, function (Faker $faker) {


    return [
        'storeNumber' => $faker->sentence(1),
        'address_id' => $faker->sentence(1),
        'site_id' => $faker->sentence(1),
        //'lat' => $faker->float(53.286706),
        //lon' => $faker->float(-6.371848),
        'cfsFlag_id' => $faker->sentence(1)
    ];
});
