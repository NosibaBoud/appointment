<?php
// database/seeders/AdminUserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert an admin user into the 'users' table
        DB::table('admin')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com', // Change this to a real admin email
            'password' => Hash::make('adminpassword'), // Make sure the password is hashed
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
