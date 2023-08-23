<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import Hash facade

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([


            'email' => 'admin@admin.com',
            'password' => Hash::make('admin@123'), // Use Hash::make() to hash the password
            'user_type' => 'admin'

        ]);
    }
}
