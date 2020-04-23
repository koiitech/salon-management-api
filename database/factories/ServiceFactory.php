<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use App\Business;
use App\Category;
use App\Extra;
use App\Facilities;
use App\Salon;
use App\Service;
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

$factory->define(Category::class, function (Faker $faker) {
  return [
    'name' => $faker->name,
    'description' => $faker->paragraph,
    'image' => $faker->image(300, 300),
  ];
});

$factory->define(Service::class, function (Faker $faker) {
  return [
    'name' => $faker->name,
    'description' => $faker->paragraph,
    'image' => $faker->image(300, 300),
    'price' => $faker->randomElement(10, 15, 20, 25, 30),
    'minutes' => $faker->randomElement([5, 10, 15]),
  ];
});

$factory->define(Extra::class, function (Faker $faker) {
  return [
    'name' => $faker->name,
    'description' => $faker->paragraph,
    'image' => $faker->image(300, 300),
  ];
});