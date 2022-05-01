<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminDeleteBookTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_delete_book()
    {
        $user = User::first();
        $book = Book::first();

        $token = $user->createToken($user->name);

        $response = $this->delete('/api/books/'.$book->_id, [], [
            'Authorization' => 'Bearer '.$token->plainTextToken
        ]);

        $this->assertArrayHasKey('success', $response);
    }
}
