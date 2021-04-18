<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Comments::truncate();

        $users = User::all();
        $articles = Article::all();

        foreach ($users as $value) {
            JWTAuth::attempt(['email' => $value->email, 'password' => '123']);

            foreach ($articles as $value) {
                Comments::create([
                    'text' => 'hola mundo',
                    'article_id' => $value->id
                ]);
            }

        }

    }
}
