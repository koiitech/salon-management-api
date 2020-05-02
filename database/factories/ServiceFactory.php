<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use App\Business;
use App\Category;
use App\Extra;
use App\Facility;
use App\Salon;
use App\Service;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

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

$factory->define(Category::class, function (Faker $faker) {
  return [
    'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
    'description' => $faker->paragraph,
    // 'image' => $faker->imageUrl(300, 300),
  ];
});

$factory->define(Service::class, function (Faker $faker) {
  return [
    'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
    'description' => $faker->paragraph,
    // 'image' => $faker->imageUrl(300, 300),
    'price' => Arr::random([10, 15, 20, 25, 30]),
    'minutes' => Arr::random([5, 10, 15]),
  ];
});

$factory->define(Extra::class, function (Faker $faker) {
  return [
    'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
    'description' => $faker->paragraph,
    // 'image' => $faker->imageUrl(300, 300),
  ];
});
