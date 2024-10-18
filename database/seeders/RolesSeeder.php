<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $account = [
            [
                'name' => 'Dina Pratami Putri',
                'email' => 'dina.pratami@gmail.com',
                'password' => bcrypt('Dina1234'),
                'roles' => 'Super Admin'
            ],
            [
                'name' => 'Pratami Dina',
                'email' => 'pratami@gmail.com',
                'password' => bcrypt('12345678'),
                'roles' => 'Admin'
            ],

            ];
            foreach($account as $key => $value)
            {
                User::create($value);
            }
    }
}
