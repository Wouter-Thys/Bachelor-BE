<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::factory()->create([
            "name" => "Admin",
            "email" => "admin@admin.be",
            "password" => Hash::make("password"),
            "organization" => "Admin",
            "ics" => null,
        ]);
        $adminUser->assignRole('admin');
        $adminUser->assignRole('user');
        $adminUser->assignRole('landlord');

        $user1 = User::factory()->create([
            "name" => "Wouter Thys",
            "email" => "wouter.thys@outlook.com",
            "password" => Hash::make("password"),
            "organization" => "Scouts Beringen-Mijn",
            "ics" => null,
        ]);
        $user1->assignRole('user');
        $user1->assignRole('pending-landlord');

        $user2 = User::factory()->create([
            "name" => "Lukas Vanhoof",
            "email" => "lukas.vanhoof@gmail.be",
            "password" => Hash::make("password"),
            "organization" => "Scouts Antwerpen",
            "ics" => null,
        ]);
        $user2->assignRole('user');
    }
}
