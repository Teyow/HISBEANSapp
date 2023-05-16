<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '1',
            'fname' => 'Admin',
            'lname' => '123',
            'username' => 'admin123',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'cnumber' => '0925778545',
            'status' => 'enable',
            //  'user_role' => '1',
            'email_verified_at' => now()

        ]);
    }
}
