<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use App\Customer;
use App\Employee;
use App\Staff;
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

$factory->define(Appointment::class, function (Faker $faker) {
  return [
    'scheduled_at' => $faker->dateTimeThisYear,
  ];
});

$factory->define(Appointment::class, function (Faker $faker) {
  return [
    'scheduled_at' => $faker->dateTimeThisYear,
  ];
});
