<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class SalonSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    $businesses = factory(App\Business::class, 10)->create()->pluck('id')->toArray();
    $facilities = factory(App\Facility::class, 10)->create()->pluck('id')->toArray();


    factory(App\Brand::class, 5)->create()->each(function ($brand) use ($businesses, $facilities) {
      $salons = factory(App\Salon::class, rand(1, 3))->make();
      $brand->salons()->saveMany($salons);

      foreach ($salons as $key => $salon) {
        $salon->businesses()->sync(Arr::random($businesses, 3));
        $salon->facilities()->sync(Arr::random($facilities, 4));
      }
    });
  }
}
