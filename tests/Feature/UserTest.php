<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register()
    {
        $response = $this->postJson('/api/register',[
            "name" => "Ahmet",
            "email" => "ahmetest13@gmail.com",
            "password" => "123456",
            "password_confirmation" => "123456"
        ]);

        $response->assertStatus(201);
    }

    public function test_register_unique_with_nonuniq_creds()
    {
        $this->postJson('/api/register',[
            "name" => "Ahmet",
            "email" => "ahmetest13@gmail.com",
            "password" => "123456",
            "password_confirmation" => "123456"
        ]);
        $response = $this->postJson('/api/register',[
            "name" => "Ahmet",
            "email" => "ahmetest13@gmail.com",
            "password" => "123456",
            "password_confirmation" => "123456"
        ]);

        $response
            ->assertStatus(422)
            ->assertJson([
                "errors" => [
                    "email" => [
                        "The email has already been taken."
                    ]
                ]
            ]);
    }

    public function test_login()
    {
        $this->postJson('/api/register',[
            "name" => "Ahmet",
            "email" => "ahmetest13@gmail.com",
            "password" => "123456",
            "password_confirmation" => "123456",
        ]);
        $response = $this->postJson('/api/login',[
            "email" => "ahmetest13@gmail.com",
            "password" => "123456"
        ]);
        $response->assertStatus(201);


    }

    public function test_logout()
    {
        $user = factory('App\User')->create();
        $this->postJson('/api/register',[
            "name" => "Ahmet",
            "email" => "ahmetest1222ee3232312@gmail.com",
            "password" => "123456",
            "password_confirmation" => "123456",
        ])->assertStatus(201);

        $response = $this->postJson('/api/login',[
            "email" => "ahmetest13@gmail.com",
            "password" => "123456"
        ])->assertStatus(201);

        $this->postJson('/api/logout',[],[$response->json()["token"]])->assertStatus(200);


    }
}
