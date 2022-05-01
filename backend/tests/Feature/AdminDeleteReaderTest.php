<?php

namespace Tests\Feature;

use App\Models\Reader;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminDeleteReaderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_delete_reader()
    {
        $user = Reader::first();

        $token = $user->createToken($user->name);

        $response = $this->delete('/api/readers/'.$user->_id, [], [
            'Authorization' => 'Bearer '.$token->plainTextToken
        ]);

        $this->assertArrayHasKey('success', $response);
    }
}
