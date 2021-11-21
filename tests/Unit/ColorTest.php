<?php

namespace Tests\Unit;

use Tests\TestCase;

class ColorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testLoginPostCorrect()
    {
        $credential = [
            'email' => 'ps@gmail.com',
            'password' => '12345678'
        ];

        $response = $this->post('login',$credential);
        $this->assertAuthenticated();
    }

    public function testColorGet()
    {
        $this->testLoginPostCorrect();
        $response = $this->get("dashboard/color");
        $response->assertStatus(200);
    }
}
