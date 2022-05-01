<?php

namespace Database\Seeders;

use App\Models\Reader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ReaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $readers = [
            [
                'name' => 'Cypress',
                'email' => 'cypress@cypress.com.br',
                'password' => Hash::make('teste'),
                'phone' => '(41) 99999-9999',
                'birthday' => '1985-12-12',
                'address' => 'Rua Teste, 12',
            ],
            [
                'name' => 'Teste',
                'email' => 'teste@teste.com',
                'password' => Hash::make('teste'),
                'phone' => '(41) 99999-9999',
                'birthday' => '1985-12-12',
                'address' => 'Rua Teste, 12',
            ]
        ];

        foreach ($readers as $reader) {
            Reader::create($reader);
        }
    }
}
