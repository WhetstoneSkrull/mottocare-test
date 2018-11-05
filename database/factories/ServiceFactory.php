<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
    //  'id'=>$faker->integer(1),
        'name' =>$faker->text(15),
        'service_category_id' =>$faker->text(22),
    //    'category' =>$faker->text(190),
    ];
});
