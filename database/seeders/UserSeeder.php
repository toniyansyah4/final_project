<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name'          => 'admin',
            'email'         => 'admin@mail.com',
            'password'      => Hash::make('admin1234')
        ]);

        User::create([
            'name'          => 'toni',
            'email'         => 'toni@mail.com',
            'password'      => Hash::make('toni1234')
        ]);
    }
}