<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

final class StoreServerLocationTest extends TestCase
{
    public function testWith_InitialGet_Expect_NoServerLocationAvailable() : void
    {
        Storage::fake('local');

        $response = $this->get(route('server.location.get'));
        $response->assertNotFound();
    }

    public function testWith_PostLatLong_Expect_ServerLocationAvailable() : void
    {
        Storage::fake('local');

        $response = $this->get(route('server.location.get'));
        $response->assertNotFound();

        $response = $this->post(route('server.location.post'), ['latitude' => 100, 'longitude' => 200]);
        $response->assertCreated();

        $response = $this->get(route('server.location.get'));
        $response->assertOk();
        $response->assertJson(['latitude' => 100, 'longitude' => 200]);
    }
}
