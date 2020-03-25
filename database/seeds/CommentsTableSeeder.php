<?php

use App\Comment;
use App\Post;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            factory(Comment::class, 30)->create(['post_id' => $post->id]);
        }
    }
}