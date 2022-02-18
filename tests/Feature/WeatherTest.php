<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeatherTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_get_request_id(){
        $response = $this->get('/api/weathers/3');
        $response
            ->assertStatus(200)
            ->assertJson([
                'city'=> 'Istanbul'
            ]);
    }

    public function test_get_request()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->get('/api/weathers');
        $response->assertStatus(200);
    }

    public function test_post_request()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->postJson('/api/weathers',[
                "city" => "Istanbul",
                "zipcode" => 34400,
                "weather" => "Nemli"
            ]);
        $response
            ->assertStatus(201)
            ->assertJson([
                'city' => "Istanbul",
                'zipcode' => 34400,
                "weather" => "Nemli"
            ]);

    }
    public function test_put_request()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->putJson('/api/weathers/2',
                [
                    "city" => "Istanbul",
                    "zipcode" => 34401,
                    "weather" => "Nemli"
                ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => 2,
                'city' => "Istanbul",
                'zipcode' => 34401,
                "weather" => "Nemli"
            ]);

    }
    public function test_delete_request()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)
            ->delete('/api/weathers/2');
        $response -> assertStatus(200);
    }
}
