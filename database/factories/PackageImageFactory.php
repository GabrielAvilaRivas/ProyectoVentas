<?php

use Faker\Generator as Faker;
use App\PackageImage;

$factory->define(PackageImage::class, function (Faker $faker) {
    return [
        'image' => $faker->imageUrl(250,250),
        'package_id' => $faker->numberBetween(1,100)
    ];
});
