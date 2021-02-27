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
        	'content' => '
            <h1>Example content post</h1>
            <br><br>
            <img src="https://cdn.business2community.com/wp-content/uploads/2013/09/best-press-release-example.jpg">
            '
        ]);
    }
}
