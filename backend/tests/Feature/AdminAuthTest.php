<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_admin_auth_returns_ok()
    {
        $response = $this->post('/api/admin-login', [
            'email' => 'admin@teste.com',
            'password' => 'teste'
        ]);

        $response->assertSee($response['plainTextToken']);
    }
}
