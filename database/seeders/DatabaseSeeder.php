<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(): void
{
    User::create([
        'name' => 'Super Admin',
        'nickname' => 'Admin',
        'email' => 'admin@yahoo.com',
        'phone' => '08123456789',
        'password' => Hash::make('admin1234'),
        'role' => 'admin',
    ]);
}
}
