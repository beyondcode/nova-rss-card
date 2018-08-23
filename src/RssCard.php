<?php

namespace Beyondcode\RssCard;

use Laravel\Nova\Card;

class RssCard extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'beyondcode-rss-card';
    }

    public function __construct($feed, $height = null)
    {
        parent::__construct();

        $this->withMeta([
            'feed' => $feed,
            'height' => $height,
        ]);
    }
}
