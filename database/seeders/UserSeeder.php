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
        User::create([
            'name' => 'Fran Domitrovic',
            'email' => 'fran.domitrovic@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('Pasword1234!')
        ]);
    }
}
