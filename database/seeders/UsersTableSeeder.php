<?php

namespace Database\Seeders;

use App\Models\Profile;
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
        if($user->profile == null){
            Profile::create([
                'user_id'   => $user->id,
                'image'     => 'default.png',
                'facebook'  => 'https://www.facebook.com',
                'twitter'   => 'https://www.twitter.com',
                'linkedin'   => 'https://www.linkedin.com',
                'about'     => 'About here',
            ]);
        }

        $user->attachRole("super_admin");


    }
}
