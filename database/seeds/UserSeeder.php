<?php

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
  }
}
