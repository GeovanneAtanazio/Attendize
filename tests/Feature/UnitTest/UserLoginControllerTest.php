<?php

namespace Tests\Feature\UnitTest;

use Tests\TestCase;
use App\Models\User;

class UserLoginControllerTest extends TestCase
{
    private $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);
        $this->post('/login', [
            'email' => $this->user->email,
            'password' => $password,
        ]);
    }

    /**
     * @test
     */
    public function testLogin()
    {
        $this->assertAuthenticatedAs($this->user);
    }

    /**
     * @test
     */
    public function testLogout()
    {
        $this->actingAs($this->user);
        $this->post('/logout');
        $this->assertGuest();
    }
}
