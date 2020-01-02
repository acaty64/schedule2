<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\GoogleProvider;
use Laravel\Socialite\Two\User as SocialiteUser;
use Mockery as m;
use Tests\TestCase;

class LoginTest extends TestCase
{
    
    use RefreshDatabase;

    private $email = 'docente@gmail.com';
    private $name = 'User Docente';

    protected function mockGoogleUser()
    {
        $googleUser = m::mock(SocialiteUser::class, [
            'getEmail' => $this->email,
            'getName' => $this->name,
        ]);
        $this->mockGoogleProvider()
            ->shouldReceive('user')
            ->andReturn($googleUser);
    }

    protected function mockGoogleProvider()
    {
        $provider = m::mock(GoogleProvider::class);
        // tap($valor, function ($valor){$retorno;});
        // return tap($provider, function ($provider) {
        //     Socialite::shouldReceive('driver')->with('google')->andReturn($provider);
        // });

        // tap() es lo mismo que:
        $provider = m::mock(GoogleProvider::class);
        Socialite::shouldReceive('driver')->with('google')->andReturn($provider);
        return $provider;
    }

    /** @test */
    function an_authorized_user_by_google_are_authenticated()
    {
        // Given
        // $this->withoutExceptionHandling();
        $user = $this->defaultUser([
                'email' => $this->email,
                'name' => $this->name
            ], 'doc');

        $googleUser = m::mock(SocialiteUser::class, [
            'getEmail' => $this->email,
            'getName' => $this->name
        ]);

        $this->mockGoogleProvider()
            ->shouldReceive('user')
            ->andReturn($googleUser);

        // When
        $response = $this->get('/login/callback');

        // Then
        $this->assertAuthenticated();

        $response->assertRedirect(route('app.schedule.edit', $user->id));
    }


    /** @test */
    function login_request_are_send_to_google( )
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

    /**     * @test      */
    function an_unauthorized_google_user_redirect_to_loginGoogle()
    {

        // Given
        $googleUser = m::mock(SocialiteUser::class, [
            'getEmail' => $this->email,
            'getName' => $this->name,
        ]);

        $this->mockGoogleProvider()
            ->shouldReceive('user')
            ->andReturn($googleUser);
        // When
        $response = $this->get('/login/callback');

        // Then
        $this->assertInvalidCredentials([
            'email' => $this->email,
        ]);

        $response->assertRedirect('/login');
    }
}
