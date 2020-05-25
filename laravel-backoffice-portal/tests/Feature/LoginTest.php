<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_access_login_page()
    {
        //When user/guest visit the login page
        $response = $this->get('/login');
        
        //He should be able to access login page
        $response->assertSee("Login");
    }
}