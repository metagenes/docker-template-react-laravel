<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PingControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_ping_success_example(): void
    {
        $response = $this->get(route('ping'));

        $response->assertStatus(200)
                 ->assertJson([
                     'status' => 200,
                     'message' => 'Success',
                 ]);
    }
}
