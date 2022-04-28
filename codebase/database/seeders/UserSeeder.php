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
        $adminUser->assignRole('seller');
    }
}
