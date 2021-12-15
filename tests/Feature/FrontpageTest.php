<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

final class FrontpageTest extends TestCase
{
    public function testFrontPageIsAvailable() : void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
