<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class CreatePagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pagge = Page::create([
        	'title' => 'Example', 
        	'content' => '<h1>Example content post</h1>'
        ]);
    }
}
