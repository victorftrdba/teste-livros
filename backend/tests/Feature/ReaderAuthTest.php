<?php

namespace Tests\Feature;

use App\Models\Reader;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReaderAuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_reader_auth_returns_ok()
    {
        $reader = Reader::factory()->create();

        $response = $this->post('/api/reader-login', [
            'email' => $reader['email'],
            'password' => 'teste',
        ]);

        $response->assertSee($response['plainTextToken']);
    }
}
