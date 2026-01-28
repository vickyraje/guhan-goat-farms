<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
        // Seed test user 1
        $seededAdminEmail = 'admin@goovago.com';
        $user = User::where('email', '=', $seededAdminEmail)->first();
        if ($user === null) {
            $user = User::create([
                'name'      => 'Admin',
                'email'     => $seededAdminEmail,
                'password'  => Hash::make('admin@2025'),
            ]);
        }
    }
}
