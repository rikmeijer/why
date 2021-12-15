<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class StoreServerLocationTest extends TestCase
{
    public function testWith_InitialGet_Expect_NoServerLocationAvailable() : void
    {
        $response = $this->get(route('server.location'));
        $response->assertStatus(404);


//        $response = $this->post(route('server.location'), ['latitude' => 100, 'longitude' => 200]);
//        $response->assertStatus(404);
//
//        $response = $this->get(route('server.location'));
//        $response->assertStatus(200);
//        $response->assertJson(['latitude' => 100, 'longitude' => 200]);
    }
}
