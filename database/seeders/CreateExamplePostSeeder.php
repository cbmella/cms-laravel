<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class CreateExamplePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = Post::create([
        	'title' => 'Example', 
        	'content' => '<h1>Example content post</h1>',
        	'excerpt' => 'Example content post',
        ]);
    }
}
