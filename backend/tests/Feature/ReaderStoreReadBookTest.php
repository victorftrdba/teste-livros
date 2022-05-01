<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Reader;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReaderStoreReadBookTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_reader_store_read_books()
    {
        $reader = Reader::factory()->create();

        $token = $reader->createToken($reader['name']);

        $book = Book::first()->toArray();

        $response = $this->post('/api/store-read-book/'.$reader['_id'], [
            'book_id' => $book['_id'],
        ], [
            'Authorization' => 'Bearer '.$token->plainTextToken
        ]);

        $this->assertArrayHasKey('success', $response);
    }
}
