<?php

namespace Tests\Unit;

use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $response = $this->post('api/login',['name'=>'marker_1','password'=>'password']);
        $response->assertStatus(200);
    }



}
