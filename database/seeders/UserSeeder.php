<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name'	=> 'Admin',
                'username'	=> 'admin',
                'email'	=> 'admin@gmail.com',
                'password'	=> Hash::make('123')
            ],
            [
                'name'	=> 'Novan',
                'username'	=> 'novan',
                'email'	=> 'novan@gmail.com',
                'password'	=> Hash::make('123')
            ],
        ]);
    }
}
