<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class CreateBasicTemplate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Setting::create([
            'key' => 'template', 
            'active' => 1,
            'display_name' => 'Plantilla de prueba basica',
            'value' => 'prueba'
        ]);
    }
}
