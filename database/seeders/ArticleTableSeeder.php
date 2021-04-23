<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Namshi\JOSE\JWS;
use Tymon\JWTAuth\Facades\JWTAuth;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Article::truncate();

        $users = User::all();

        foreach ($users as $value) {
            JWTAuth::attempt(['email' => $value->email, 'password' => '123']);
            Article::factory()->times(5)->create();
        }


    }
}
