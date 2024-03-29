<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Post;
use App\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i<5; $i++){
            $user = User::all()->first();
            $user_id = $user['id'];
            $cat=rand(6,10);

            $post = new Post();
            $post->user_id = $user_id;
            $post->title = $faker->words(5, true);
            $post->content = $faker->text();
            $post->slug= Str::of($post->title)->slug("-");
            $post->category_id = $cat;
            $post->save();
        }
    }
}
