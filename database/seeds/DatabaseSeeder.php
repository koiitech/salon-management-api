<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    $this->call(AuthSeeder::class);
    $this->call(UserSeeder::class);
    $this->call(SalonSeeder::class);
    $this->call(ServiceSeeder::class);
  }
}
