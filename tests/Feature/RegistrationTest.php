<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function testRegistrationPageCanBeRendered()
    {
        $response = $this->get('/register');

        $response->assertOk();
    }

    public function testUserCanRegisterAndDontGetAdminRole()
    {
        $this->post('/register', [
            'name' => 'test user',
            'email' => 'test@email.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $this->assertAuthenticated();

        $this->assertDatabaseCount('users', 1);

        $this->assertDatabaseHas('users', [
            'name' => 'test user',
            'email' => 'test@email.com'
        ]);

        $this->assertFalse(User::find(1)->is_admin);
    }
}
