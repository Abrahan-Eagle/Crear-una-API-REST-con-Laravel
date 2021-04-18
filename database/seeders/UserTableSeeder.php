<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'abrahan pulido',
            'email' => 'thehackeroffire@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'), // password
            'remember_token' => Str::random(10),
        ]);

      $users = User::factory()->times(4)->create();
/*
      $users->category()->saveMany(
          $this->faker->randomElements(
              array(
                  Category::find(1),
                  Category::find(2),
                  Category::find(3),
                ), $this->faker->numberBetween(1, 3), false
            )
        );
        */

    }
}
