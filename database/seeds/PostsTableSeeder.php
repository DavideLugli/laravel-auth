<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      $usersCount = count(User::all()->toArray()) - 1;
      for ($i=0; $i < 10; $i++) {
      $newPost = new Post;
      $newPost->title = $faker->sentence(5);
      $newPost->body = $faker->text(255);
      $newPost->slug = rand(1, 40) . '-' . Str::slug($newPost->title);
      // $newPost->user_id = 1;
      $newPost->user_id = rand(1, $usersCount);

      $newPost->save();
      }
    }
}
