<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $this->assertTrue(true);
    }

    public function testHello()
    {
        $res = $this->get('/login');
        
        $res->assertSeeText('Password');
        $res->assertSeeText('Login');
        Log::info('finished test testHello');
    }
    public function testUserLogin()
    {
        // $usr = User::create([
        //     'name' => 'test_user',
        //     'email' => 'testuser@example.com',
        //     'password' => Hash::make('pass'),
        // ]);
        $usr = factory(User::class)->make();
        $login_page = $this->get('/login');
        $login_page->assertSeeText('Login');

        
        
        // $req = $this->post('login',get_object_vars($usr));
        // $req->assertRedirect('/home');
        
    }
}
