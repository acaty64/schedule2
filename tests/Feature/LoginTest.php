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
        $this->seed();
        $this->withoutExceptionHandling();


        // factory(User::class)->create([
        //     'email' => $email,
        // ]);

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

        $response->assertRedirect('/home');
    }


    /** @test */
    // function new_users_authorized_by_google_are_registered_and_authenticated()
    // {
    //     // Given...
    //     $this->mockGoogleUser();
    //     // When
    //     $response = $this->get('/login/callback');
    //     // Then
    //     $this->assertDatabaseHas('users', [
    //         'email' => $this->email,
    //         'name' => $this->name,
    //     ]);
    //     $this->assertAuthenticated();
    //     $response->assertRedirect('/home');
    // }



    /** @test */
    function login_request_are_send_to_google( )
    {
        // Testing: return Socialite::driver('google')->redirect();
        $message = 'Redirecting to Google...';
        $this->mockGoogleProvider()
            ->shouldReceive('redirect')
            ->andReturn($message);
        $this->get('/loginGoogle')
                ->assertStatus(200)
                ->assertSee($message);
           
    }
}
