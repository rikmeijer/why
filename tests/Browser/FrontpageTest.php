<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

final class FrontpageTest extends DuskTestCase
{
    public function testSeeWhy() : void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Why');
        });
    }
    public function testSeeOpenStreetMap() : void
    {
        config()->set('app.location', null);
        $this->browse(function (Browser $browser) {
            $browser->resize(1024, 768)
                ->visit('/')
                ->assertSee('Leaflet | © OpenStreetMap contributors')
                ->assertNotPresent('.leaflet-marker-icon')
                ->clickAtPoint(512, 384)
            ->assertPresent('.leaflet-marker-icon')

            ->refresh()
                ->assertSee('Leaflet | © OpenStreetMap contributors')
                ->assertPresent('.leaflet-marker-icon');
        });
    }
}
