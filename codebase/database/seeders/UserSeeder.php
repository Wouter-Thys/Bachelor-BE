<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $imageUser = 'https://images.pexels.com/photos/674010/pexels-photo-674010.jpeg?cs=srgb&dl=pexels-anjana-c-674010.jpg&fm=jpg';

        $adminUser = User::factory()->create([
            "name" => "Admin",
            "email" => "admin@admin.be",
            "password" => "password",
            "organization" => "Admin",
            "ics" => null,
        ]);
        $adminUser->assignRole('admin');
        $adminUser->assignRole('user');
        $adminUser->assignRole('landlord');

        $user1 = User::factory()->create([
            "name" => "Wouter Thys",
            "email" => "wouter.thys@outlook.com",
            "phone_number" => null,
            "phone_number_verified_at" => null,
            "password" => "password",
            "organization" => "Scouts Beringen-Mijn",
            "ics" => null,
        ]);
        $user1->assignRole('user');
        $user1->assignRole('pending-landlord');
        $user1->addMediaFromUrl($imageUser)->toMediaCollection('landlordRequest')->save();

        $user2 = User::factory()->create([
            "name" => "Lukas Vanhoof",
            "email" => "lukas.vanhoof@gmail.be",
            "email_verified_at" => null,
            "password" => "password",
            "organization" => "Scouts Antwerpen",
            "ics" => null,
        ]);
        $user2->assignRole('user');
        $user2->assignRole('pending-landlord');
        $user2->addMediaFromUrl($imageUser)->toMediaCollection('landlordRequest')->save();


        $users = User::factory(10)->create();
        foreach ($users as $user) {
            $user->assignRole('user');
            $user->assignRole('pending-landlord');
            $user->addMediaFromUrl($imageUser)->toMediaCollection('landlordRequest')->save();
        }
    }
}
