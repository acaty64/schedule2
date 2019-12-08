<?php

namespace Tests\Feature;

use Mockery as m;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Socialite\Facades\Socialite;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /** @test */
    function login_request_ar_send_to_google( )
    {
        // Testing: return Socialite::driver('google')->redirect();
        $message = 'Redirecting to Google...';
        $this->mockGoogleProvider()
            ->shouldReceive('redirect')
            ->andReturn($message);
        $this->get('/login')
                ->assertStatus(200)
                ->assertSee($message);
           
    }

    protected function mockGoogleProvider()
    {
        $provider = m::mock(GoogleProvider::class);
        // tap($valor, function ($valor){$retorno;});
        tap($provider, function ($provider) {
            Socialite::shouldReceive('driver')->with('google')->andReturn($provider);
        });

        return $provider;
    }

}
