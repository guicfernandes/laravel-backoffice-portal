<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Message;
use Auth;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MessagesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_message_requires_a_subject(){

        $this->actingAs(factory('App\User')->create());

        $message = factory('App\Message')->make(['subject' => null]);

        $this->post('/messages/create',$message->toArray())
                ->assertSessionHasErrors('subject');
    }

    /** @test */
    public function a_message_requires_a_content(){

        $this->actingAs(factory('App\User')->create());

        $message = factory('App\Message')->make(['content' => null]);

        $this->post('/messages/create',$message->toArray())
            ->assertSessionHasErrors('content');
    }

    /** @test */
    public function a_message_requires_a_start_date(){

        $this->actingAs(factory('App\User')->create());

        $message = factory('App\Message')->make(['start_date' => null]);

        $this->post('/messages/create',$message->toArray())
            ->assertSessionHasErrors('start_date');
    }

    /** @test */
    public function a_message_requires_a_expiration_date(){

        $this->actingAs(factory('App\User')->create());

        $message = factory('App\Message')->make(['expiration_date' => null]);

        $this->post('/messages/create',$message->toArray())
            ->assertSessionHasErrors('expiration_date');
    }

    
}