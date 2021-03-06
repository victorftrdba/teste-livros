<?php

namespace Tests\Feature;

use App\Models\Reader;
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
        $reader = Reader::factory()->create();

        $token = $reader->createToken($reader['name']);

        $response = $this->get('/api/books', [
            'Authorization' => 'Bearer '.$token->plainTextToken
        ]);

        foreach ($response['books'] as $book) {
            $this->assertArrayHasKey('name', $book);
        }
    }
}
