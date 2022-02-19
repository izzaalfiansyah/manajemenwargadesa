<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'username' => 'superadmin',
            'password' => Hash::make('superadmin'),
            'nama' => 'Muhammad Izza Alfiansyah',
            'alamat' => 'Karanganyar, Gumukmas, Jember',
            'telepon' => '081231921351',
            'role' => '1'
        ]);
    }
}
