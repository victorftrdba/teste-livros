<?php

namespace Tests\Feature;

use App\Models\User;
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
        $user = User::factory()->create();

        $response = $this->post('/api/admin-login', [
            'email' => $user['email'],
            'password' => 'teste'
        ]);

        $response->assertSee($response['plainTextToken']);
    }
}
