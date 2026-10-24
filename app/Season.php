<?php

namespace App;

use DateTimeInterface;

/**
 * Meteorological seasons, which pick the site's accent colour (<html data-season>, resources/css/app.css).
 */
enum Season: string
{
    case Spring = 'spring';
    case Summer = 'summer';
    case Autumn = 'autumn';
    case Winter = 'winter';

    /**
     * The season a date falls in: spring is March to May, summer June to August, autumn September to November.
     */
    public static function of(DateTimeInterface $date): self
    {
        return match ((int) $date->format('n')) {
            3, 4, 5 => self::Spring,
            6, 7, 8 => self::Summer,
            9, 10, 11 => self::Autumn,
            default => self::Winter,
        };
    }
}
