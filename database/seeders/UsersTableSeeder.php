<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin SSC
        User::create([
            'role_id' => 1,
            'user_number' => '00' . rand(10, 90) . rand(101, 199) . rand(200, 999),
            'name' => 'Admin SSC',
            'image' => 'assets/images/profiles/default.png',
            'email' => 'ssc@mail.com',
            'password' => Hash::make('rahasia'),
            'address' => 'Surabaya',
            'organization' => 'Telkom University',
            'status' => 0
        ]);

        // Admin Logistic
        User::create([
            'role_id' => 2,
            'user_number' => '00' . rand(10, 90) . rand(101, 199) . rand(200, 999),
            'name' => 'Admin Logistic',
            'image' => 'assets/images/profiles/default.png',
            'email' => 'log@mail.com',
            'password' => Hash::make('rahasia'),
            'address' => 'Surabaya',
            'organization' => 'Telkom University',
            'status' => 0
        ]);

        // Mahasiswa
        User::create([
            'role_id' => 3,
            'user_number' => '00' . rand(10, 90) . rand(101, 199) . rand(200, 999),
            'name' => 'Mahasiswa',
            'image' => 'assets/images/profiles/default.png',
            'email' => 'mhs@mail.com',
            'password' => Hash::make('rahasia'),
            'address' => 'Surabaya',
            'organization' => 'Badan Eksekutif Mahasiswa',
            'status' => 0
        ]);

        // factory(User::class, 10)->create();
    }
}
