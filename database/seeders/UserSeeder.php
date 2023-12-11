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
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'operator',
                'password' => Hash::make('password'),
                'role' => 'operator'
            ],
            [
                'username' => 'mhs1',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'mahasiswa_id' => 1
            ],
            [
                'username' => 'mhs2',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'mahasiswa_id' => 2
            ],
            [
                'username' => 'mhs3',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'mahasiswa_id' => 3
            ],
            [
                'username' => 'mhs4',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'mahasiswa_id' => 4
            ],
            [
                'username' => 'mhs5',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'mahasiswa_id' => 5
            ],
            [
                'username' => 'mhs6',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'mahasiswa_id' => 6
            ],
            [
                'username' => 'mhs7',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'mahasiswa_id' => 7
            ],
            [
                'username' => 'mhs8',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'mahasiswa_id' => 8
            ],
            [
                'username' => 'mhs9',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'mahasiswa_id' => 9
            ],
            [
                'username' => 'mhs10',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'mahasiswa_id' => 10
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
