<?php

namespace Tests\Feature;

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
    public function test_get_request()
    {
        $response = $this->get('/api/weathers');
        $response->assertStatus(200);
    }

    public function test_post_request()
    {
        $response = $this->postJson('/api/weathers',
        [
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
        $response = $this->putJson('/api/weathers/3',
        [
        "city" => "Istanbul",
        "zipcode" => 34401,
        "weather" => "Nemli"
        ]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => 3,
                'city' => "Istanbul",
                'zipcode' => 34401,
                "weather" => "Nemli"
            ]);

    }
    public function test_delete_request()
    {
        $response = $this -> delete('/api/weathers/2');
        $response -> assertStatus(200);
    }
}
