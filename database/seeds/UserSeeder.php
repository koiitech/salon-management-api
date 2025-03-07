<?php

use App\Brand;
use App\Employee;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    User::create([
      'name' => 'Ken Kiều',
      'email' => 'admin@gmail.com',
      'password' => '123456'
    ]);

    factory(App\User::class, 5)->create();
    factory(App\Customer::class, 5)->create();

    $brands = Brand::all();
    $brands[0]->employees()->create([
      'name' => 'An Nguyen',
      'email' => 'employee@gmail.com',
      'password' => '123456',
    ]);

    foreach ($brands as $key => $brand) {
      $employees = factory(App\Employee::class, rand(5, 10))->make();
      $brand->employees()->saveMany($employees);
    }
  }
}
