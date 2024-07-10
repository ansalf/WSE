<?php

namespace Database\Seeders;

use App\Constant\DBTypes;
use App\Helpers\Functions;
use App\Models\User;
use App\Services\TypeService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    function findType(String $code)
    {
        $service = new TypeService();
        return $service->getIdWithCode($code);
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name'	=> 'Super Admin',
                'username'	=> 'admin',
                'email'	=> 'admin@gmail.com',
                'password'	=> Hash::make('123'),
                'role' => $this->findType(DBTypes::RoleSuperAdmin),
                'gender' => $this->findType(DBTypes::UserGenderM),
            ],
            [
                'name'	=> 'Novan',
                'username'	=> 'novan',
                'email'	=> 'novan@gmail.com',
                'password'	=> Hash::make('123'),
                'role' => $this->findType(DBTypes::RoleAnggota),
                'gender' => $this->findType(DBTypes::UserGenderM),
            ],
        ]);
    }
}
