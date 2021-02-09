<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CreateAdminUserSeeder::class,
            CreateEditorUserSeeder::class,
            PermissionTableSeeder::class,
            CreateRoleHasPermissionsSeeder::class,
            TemplateSeeder::class,
            CreateBasicTemplate::class,
            CreateExamplePostSeeder::class
        ]);
    }
}
