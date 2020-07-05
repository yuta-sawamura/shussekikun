<?php

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
            OrganizationsTableSeeder::class,
            StoresTableSeeder::class,
            CategoriesTableSeeder::class,
            UsersTableSeeder::class,
            ClassworksTableSeeder::class,
            SchedulesTableSeeder::class,
            NewsTableSeeder::class,
        ]);
    }
}
