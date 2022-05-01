<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReaderCanBrowseBooksTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_reader_can_browse_books()
    {
        $response = $this->post('/api/reader-login', [
            'email' => 'joao@gmail.com',
            'password' => 'teste'
        ]);

        $responseToken = json_encode($response);
        $responseToken = json_decode($responseToken);

        $book = $this->get('/api/books', [
            'Authorization' => 'Bearer '.$responseToken->baseResponse->original->plainTextToken
        ]);

        $response->assertSee($book->name);
    }
}
