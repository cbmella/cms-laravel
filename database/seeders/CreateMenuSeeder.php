<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class CreateMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::create([
        	'title' => 'Example', 
        	'link' => '/',
        ]);

        $menu = Menu::create([
        	'title' => 'Blog', 
        	'link' => 'blog',
        ]);
    }
}
