<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /*
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
*/
    public function test_auth()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->post('/api/logout');
        $response->assertStatus(200);
    }
}
