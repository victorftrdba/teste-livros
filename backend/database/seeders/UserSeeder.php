<?php

namespace Database\Seeders;

use App\Models\Reader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
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
        Reader::create([
            'name' => 'Teste',
            'email' => 'teste@teste.com',
            'password' => Hash::make('teste'),
        ]);

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@teste.com',
            'password' => Hash::make('teste'),
        ]);
    }
}
