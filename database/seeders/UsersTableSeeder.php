<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create new user
        $user = \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => 'super_admin@app.com',
            'password' => Hash::make('123456789'),
        ]);

        $user->attachRole('super_admin');
    }
}
