<?php

use App\User;
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
        $users = [
            [
                'name' => 'Jeremy Stam',
                'email' => 'jer.stam89@gmail.com'
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com'
            ]
        ];

        foreach ($users as $user) {
            User::create([
                'name'              => $user['name'],
                'email'             => $user['email'],
                'email_verified_at' => now(),
                'password'          => Hash::make('secret'),
            ]);
        }
    }
}
