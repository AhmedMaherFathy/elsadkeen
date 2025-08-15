<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default admin image path
        $defaultImage = null;
        
        // Create 15 admin users
        for ($i = 1; $i <= 15; $i++) {
            DB::table('admins')->insert([
                'name' => 'Admin ' . $i,
                'image' => $defaultImage,
                'email' => 'admin' . $i . '@example.com',
                'password' => Hash::make('password123'), // You should change this in production
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        // You can also create a specific admin with different credentials
        DB::table('admins')->insert([
            'name' => 'Super Admin',
            'image' => $defaultImage,
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'), // Change this in production
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
