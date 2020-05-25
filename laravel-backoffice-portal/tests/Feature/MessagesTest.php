<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Message;
use Auth;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class MessagesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_read_all_the_messages()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create());

        //And we have message in the database
        $message = factory('App\Message')->create();

        //When user visit the messages page
        $response = $this->get('/messages');
        
        //He should be able to read the message
        $response->assertSee($message->subject);
    }

    /** @test */
    public function a_user_can_read_single_message()
    {
        //Given we have message in the database
        $message = factory('App\Message')->create();
        //When user visit the message's URI
        $response = $this->get('/messages/'.$message->id);
        //He can see the message details
        $response->assertSee($message->title)
            ->assertSee($message->description);
    }

    /** @test */
    public function authenticated_users_can_create_a_new_message()
    {
        //Given we have an authenticated user
        $this->actingAs(factory('App\User')->create());
        //And a message object
        $message = factory('App\Message')->make();
        //When user submits post request to create message endpoint
        $this->post('/messages/create',$message->toArray());
        //It gets stored in the database
        $this->assertEquals(1,Message::all()->count());
    }

    /** @test */
    public function unauthenticated_users_cannot_create_a_new_message()
    {
        //Given we have a message object
        $message = factory('App\Message')->make();
        //When unauthenticated user submits post request to create message endpoint
        // He should be redirected to login page
        $this->post('/messages/create',$message->toArray())
            ->assertRedirect('/login');
    }

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

    /** @test */
    public function authorized_user_can_update_the_message(){

        //Given we have a signed in user
        $this->actingAs(factory('App\User')->create());
        //And a message which is created by the user
        $message = factory('App\Message')->create(['employee_id' => Auth::id()]);
        
        $message->subject = "Updated Subject";
        //When the user hit's the endpoint to update the message
        $this->put('/messages/'.$message->id, $message->toArray());
        //The message should be updated in the database.
        $this->assertDatabaseHas('messages',['id'=> $message->id , 'subject' => 'Updated Subject']);
    }

    /** @test */
    public function unauthorized_user_cannot_update_the_message(){
        //Given we have a signed in user
        $this->actingAs(factory('App\User')->create());
        //And a message which is not created by the user
        $message = factory('App\Message')->create();
        $message->subject = "Updated Subject";
        //When the user hit's the endpoint to update the message
        $response = $this->put('/messages/'.$message->id, $message->toArray());
        //We should expect a 403 error
        $response->assertStatus(403);
    }

    /** @test */
    public function authorized_user_can_cancel_the_message(){

        //Given we have a signed in user
        $this->actingAs(factory('App\User')->create());
        //And a message which is created by the user
        $message = factory('App\Message')->create(['employee_id' => Auth::id()]);
        //When the user hit's the endpoint to cancel the message
        $this->delete('/messages/'.$message->id);
        //The message should be canceled from the database.
        // $this->assertDatabaseMissing('messages',['id'=> $message->id]);
        $this->assertDatabaseHas('messages',['id'=> $message->id , 'active' => false]);
    }

    /** @test */
    public function unauthorized_user_cannot_canceled_the_message(){
        //Given we have a signed in user
        $this->actingAs(factory('App\User')->create());
        //And a message which is not created by the user
        $message = factory('App\Message')->create();
        //When the user hit's the endpoint to cancel the message
        $response = $this->delete('/messages/'.$message->id);
        //We should expect a 403 error
        $response->assertStatus(403);
    }
}