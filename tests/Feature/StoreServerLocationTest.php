<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

final class StoreServerLocationTest extends TestCase
{

    public function testWith_InitialGet_Expect_NoServerLocationAvailable() : void
    {
        $location = config('app.location');
        config(['app.location' => null]);

        $response = $this->getJson(route('server.location.get'));
        $response->assertNotFound();

        if (isset($location)) {
            config(['app.location' => $location]);
        }
    }

    public function testWith_PostLatLong_Expect_ServerLocationAvailable() : void
    {
        $location = config('app.location');
        config(['app.location' => null]);

        $response = $this->getJson(route('server.location.get'));
        $response->assertNotFound();

        $response = $this->postJson(route('server.location.post'), ['latitude' => 100, 'longitude' => 200]);
        $response->assertCreated();

        $response = $this->getJson(route('server.location.get'));
        $response->assertOk();
        $response->assertJson(['latitude' => 100, 'longitude' => 200]);

        self::assertEquals(100, config('app.location')['latitude']);
        self::assertEquals(200, config('app.location')['longitude']);

        if (isset($location)) {
            config(['app.location' => $location]);
        }
    }

}
