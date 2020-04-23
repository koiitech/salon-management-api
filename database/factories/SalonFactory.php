<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use App\Business;
use App\Facilities;
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
    'name' => $faker->name,
    'description' => $faker->paragraph,
    'image' => $faker->image(300, 300),
  ];
});

$factory->define(Facilities::class, function (Faker $faker) {
  return [
    'name' => $faker->name,
    'description' => $faker->paragraph,
    'image' => $faker->image(300, 300),
  ];
});

$factory->define(Brand::class, function (Faker $faker) {
  return [
    'name' => $faker->name,
    'description' => $faker->paragraph,
    'logo' => $faker->image(300, 300),
    'cover' => $faker->image(900, 250),
    'address' => $faker->address,
  ];
});

$factory->define(Salon::class, function (Faker $faker) {
  return [
    'name' => $faker->name,
    'description' => $faker->paragraph,
    'logo' => $faker->image(300, 300),
    'cover' => $faker->image(900, 250),
    'address' => $faker->address,
  ];
});
