<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

final class FrontpageTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @throws \Throwable
     */
    public function testSeeWhy() : void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Why');
        });
    }
}
