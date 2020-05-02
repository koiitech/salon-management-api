<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use App\Business;
use App\Facility;
use App\Salon;
use App\User;
use Faker\Generator as Faker;
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

$factory->define(Business::class, function (Faker $faker) {
  return [
    'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
    'description' => $faker->paragraph,
    // 'image' => $faker->imageUrl(300, 300),
  ];
});

$factory->define(Facility::class, function (Faker $faker) {
  return [
    'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
    'description' => $faker->paragraph,
    // 'image' => $faker->imageUrl(300, 300),
  ];
});

$factory->define(Brand::class, function (Faker $faker) {
  return [
    'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
    'description' => $faker->paragraph,
    // 'logo' => $faker->imageUrl(300, 300),
    // 'cover' => $faker->imageUrl(900, 250),
    'address' => $faker->address,
  ];
});

$factory->define(Salon::class, function (Faker $faker) {
  return [
    'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
    'description' => $faker->paragraph,
    // 'logo' => $faker->imageUrl(300, 300),
    // 'cover' => $faker->imageUrl(900, 250),
    'address' => $faker->address,
  ];
});
