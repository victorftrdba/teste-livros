<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminCanCreateReadersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_create_readers()
    {
        $user = User::first();

        $token = $user->createToken($user->name);

        $response = $this->post('/api/books', [
            'name' => 'Livro teste',
            'gender' => 'Teste',
            'author' => 'Teste',
            'year' => '2000',
            'pages' => '1032',
            'language' => 'Inglês',
            'edition' => '1',
            'editor' => [
                'name' => 'Teste',
                'code' => '111',
                'phone' => '(00) 00000-0000'
            ],
            'isbn' => '000-00-000-000-00'
        ],[
            'Authorization' => 'Bearer '.$token->plainTextToken
        ]);

        $this->assertArrayHasKey('success', $response);
    }
}
