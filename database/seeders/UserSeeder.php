<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@pwa.rs',
            'password' => Hash::make('admin'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'Editor',
            'email' => 'editor@pwa.rs',
            'password' => Hash::make('editor'),
            'role_id' => 2
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@pwa.rs',
            'password' => Hash::make('user'),
            'role_id' => 3
        ]);
    }
}
