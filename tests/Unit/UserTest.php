<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLoginGet()
    {
        $response = $this->get('login');

        $response->assertStatus(200);
    }

    public function testLoginPostCorrect()
    {
        $credential = [
            'email' => 'ps@gmail.com',
            'password' => '12345678'
        ];

        $response = $this->post('login',$credential);
        $this->assertAuthenticated();
    }

    public function testHomeGet()
    {
        $credential = [
            'email' => 'ps@gmail.com',
            'password' => '12345678'
        ];

        $response = $this->post('login',$credential);
        $this->assertAuthenticated();

        $response = $this->get('dashboard/home');

        $response->assertStatus(200);
    }

    public function testLoginPostFalse()
    {
        $credential = [
            'email' => 'ps@gmail.com',
            'password' => '1234567'
        ];

        $response = $this->post('login',$credential);
        $response->assertSessionHasErrors();
    }

    public function testRegisterGet()
    {
        $response = $this->get('register');

        $response->assertStatus(200);
    }

    public function testSearchGet()
    {
        $credential = [
            'email' => 'ps@gmail.com',
            'password' => '12345678'
        ];

        $response = $this->post('login',$credential);
        $this->assertAuthenticated();

        $response = $this->get("dashboard/registered_users/search?searchterm=test");

        $response->assertStatus(200);

    }

    public function testBanRegUser()
    {
        $this->testLoginPostCorrect();
        $response = $this->get("dashboard/ban/30");
    }

    public function testUnBanRegUser()
    {
        $this->testLoginPostCorrect();
        $response = $this->get("dashboard/unban/30");
    }


    public function testRegisterPost()
    {
        $data = [
            'name' => 'http test2',
            'email' => 'http2@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678'
        ];
        $response = $this->post('register',$data);
        $response->assertValid(['name', 'email']);

    }

    public function testUserDelete()
    {
        $user = User::all()->last();
        $this->testLoginPostCorrect();
        $response = $this->delete("dashboard/registered_users/$user->id");
        $response->assertRedirect();

    }

//    public function test_a_welcome_view_can_be_rendered()
//    {
//        $view = $this->blade(
//            '<x-menu-title :title="$name" :class="$class" />',
//            ['name' => 'Taylor','class' => 'class']
//        );
//
//        $view->assertSeeText('Taylor');
//    }

}
