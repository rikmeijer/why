<?php

namespace Tests\Browser\Pages;

use JetBrains\PhpStorm\ArrayShape;
use Laravel\Dusk\Page as BasePage;

abstract class Page extends BasePage
{
    /**
     * Get the global element shortcuts for the site.
     *
     */
    #[ArrayShape(['@element' => "string"])] public static function siteElements() : array
    {
        return [
            '@element' => '#selector',
        ];
    }
}
