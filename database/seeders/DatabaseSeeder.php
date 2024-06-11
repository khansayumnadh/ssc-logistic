<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesTableSeeder::class);
        $this->call(ItemTypesTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ItemUserTableSeeder::class);
    }
}
