<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;


class AuthTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Usertestf',
            'email' => 'testf@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'company_id' => '1',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
}
}
