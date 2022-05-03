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
        $user1->addMediaFromUrl('https://img-19.commentcamarche.net/cI8qqj-finfDcmx6jMK6Vr-krEw=/1500x/smart/b829396acc244fd484c5ddcdcb2b08f3/ccmcms-commentcamarche/20494859.jpg')->toMediaCollection('landlordRequest')->save();

        $user2 = User::factory()->create([
            "name" => "Lukas Vanhoof",
            "email" => "lukas.vanhoof@gmail.be",
            "password" => Hash::make("password"),
            "organization" => "Scouts Antwerpen",
            "ics" => null,
        ]);
        $user2->assignRole('user');
        $user2->assignRole('pending-landlord');
        $user2->addMediaFromUrl('https://img-19.commentcamarche.net/cI8qqj-finfDcmx6jMK6Vr-krEw=/1500x/smart/b829396acc244fd484c5ddcdcb2b08f3/ccmcms-commentcamarche/20494859.jpg')->toMediaCollection('landlordRequest')->save();



    }
}
