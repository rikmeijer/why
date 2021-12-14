<?php

namespace Tests\Browser\Pages;

use JetBrains\PhpStorm\ArrayShape;
use Laravel\Dusk\Browser;

final class HomePage extends Page
{
    public function url() : string
    {
        return '/';
    }

    public function assert(Browser $browser) : void
    {
        //
    }

    #[ArrayShape(['@element' => "string"])] public function elements() : array
    {
        return [
            '@element' => '#selector',
        ];
    }
}
