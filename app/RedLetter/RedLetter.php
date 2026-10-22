<?php

namespace App\RedLetter;

use Illuminate\Support\Facades\Facade;

/**
 * @method static Verse today()
 * @method static Verse forDate(\DateTimeInterface $date)
 *
 * @see RedLetterRepository
 */
class RedLetter extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return RedLetterRepository::class;
    }
}
