<?php

namespace Database\Seeders;

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
        $admin = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('adminpass')
        ]);

        $admin->assignRole('admin');

        $user = \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@user.ru',
            'password' => Hash::make('userpass')
        ]);

        $user->assignRole('user');


    }
}
