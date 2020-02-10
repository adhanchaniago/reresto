<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'name' => 'Hanavi',
            'level' => 'admin',
            'foto' => 'user6.jpg',
        ]);

        User::create([
            'username' => 'waiter',
            'email' => 'waiter@gmail.com',
            'password' => Hash::make('waiter'),
            'name' => 'Raihan',
            'level' => 'waiter',
            'foto' => 'user6.jpg',
        ]);

        User::create([
            'username' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('kasir'),
            'name' => 'Squidward',
            'level' => 'kasir',
            'foto' => 'user6.jpg',
        ]);

        User::create([
            'username' => 'owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('owner'),
            'name' => 'Pak Rokim',
            'level' => 'owner',
            'foto' => 'user6.jpg',
        ]);
    }
}
