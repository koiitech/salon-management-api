<?php

use App\Salon;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salons = Salon::all();
        foreach ($salons as $key => $salon) {
            $categories = factory(App\Category::class, rand(3, 5))->create()->each(function ($category) {
                $services = factory(App\Service::class, rand(3, 5))->create()->each(function ($service) {
                    $extras = factory(App\Extra::class, rand(2, 5))->make();
                    if (count($extras) > 0) {
                        $service->extras()->saveMany($extras);
                    }
                });
                $category->services()->saveMany($services);
            });

            $salon->categories()->saveMany($categories);
        }
    }
}
