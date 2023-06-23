<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'nama_lengkap' => 'superadmin',
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'jabatan' => 'manajer',
            'password' => bcrypt('123456'),
        ]);

        $admin->assignRole('superadmin');

        $admin2 = User::create([
            'nama_lengkap' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'jabatan' => 'manajer',
            'password' => bcrypt('123456'),
        ]);

        $admin2->assignRole('admin');

    //     $user = User::create([
    //         'nik' => '2222222222222222',
    //         'nama' => 'user',
    //         'email' => 'user@bawaslu',
    //         'password' => bcrypt('111111'),
    //     ]);

    //     $user->assignRole('user');
    }
}
