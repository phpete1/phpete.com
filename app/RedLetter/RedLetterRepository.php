<?php

namespace App\RedLetter;

use DateTimeImmutable;
use DateTimeInterface;

/**
 * Picks the red letter verse for a given day.
 *
 * Plain PHP with no framework dependencies, so it can be extracted later.
 */
final class RedLetterRepository
{
    /**
     * @var list<array{text: string, book: string, chapter: int, verse: string}>
     */
    private readonly array $verses;

    /**
     * @param  list<array{text: string, book: string, chapter: int, verse: string}>|null  $verses  Defaults to verses.php.
     */
    public function __construct(?array $verses = null)
    {
        $this->verses = $verses ?? require __DIR__.'/verses.php';
    }

    public function today(): Verse
    {
        return $this->forDate(date: new DateTimeImmutable);
    }

    /**
     * The verse for the date's day of the year, rotating through the list when it has fewer than 366 verses.
     */
    public function forDate(DateTimeInterface $date): Verse
    {
        $entry = $this->verses[(int) $date->format('z') % count($this->verses)];

        return new Verse(
            text: $entry['text'],
            book: $entry['book'],
            chapter: $entry['chapter'],
            verse: $entry['verse'],
        );
    }
}
