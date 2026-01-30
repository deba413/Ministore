<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@example.com')->first();
        if (!$user) {
            $user = new User();
        }
            $user->name = 'admin';
            $user->email = 'admin@example.com';
            $user->role = 1; // Set role as super admin
            $user->password = Hash::make('admin@123');
            $user->save();
    }
}
