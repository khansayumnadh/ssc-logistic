<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Admin SSC',
            'description' => 'Admin SSC'
        ]);

        Role::create([
            'name' => 'Admin Logistic',
            'description' => 'Admin Logistic'
        ]);

        Role::create([
            'name' => 'Mahasiswa',
            'description' => 'Mahasiswa'
        ]);
    }
}
