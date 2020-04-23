<?php

use App\User;
use Illuminate\Database\Seeder;

class SalonSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $users = User::all();

    $businesses = factory(App\Business::class, 10)->create()->pluck('id')->toArray();
    $facilities = factory(App\Facilities::class, 10)->create()->pluck('id')->toArray();


    foreach ($users as $key => $user) {
      $brand = factory(App\Brand::class)->make();
      $user->brand()->save($brand);

      $salons = factory(App\Salon::class, rand(1, 3))->make();
      $brand->salons()->saveMany($salons);

      foreach ($salons as $key => $salon) {
        $salon->businesses->attach(array_rand($businesses, 3));
        $salon->facilities->attach(array_rand($facilities, 4));
      }
    }
  }
}
