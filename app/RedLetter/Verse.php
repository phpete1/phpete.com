<?php

namespace App\RedLetter;

/**
 * One Bible verse (or verse range), e.g. Matthew 11:28 or John 14:1-3.
 *
 * Plain PHP with no framework dependencies, so it can be extracted later.
 */
final readonly class Verse
{
    /**
     * Where url() points; swap this to change the translation source.
     * Placeholders: book (long name), chapter, verse.
     */
    private const string URL = 'https://www.esv.org/%s+%d:%s/';

    /**
     * Opening quotes that close with a different character.
     *
     * @var array<string, string>
     */
    private const array QUOTE_PAIRS = [
        '“' => '”',
        '‘' => '’',
        '«' => '»',
        '„' => '“',
    ];

    /**
     * Gospel names (long) mapped to their short form.
     *
     * @var array<string, string>
     */
    private const array BOOKS = [
        'Matthew' => 'Matt',
        'Mark' => 'Mark',
        'Luke' => 'Luke',
        'John' => 'John',
    ];

    /**
     * @param  string  $book  The long gospel name, e.g. "Matthew".
     * @param  string  $verse  The verse as written, e.g. "28" or "1-3".
     */
    public function __construct(
        private string $text,
        private string $book,
        private int $chapter,
        private string $verse,
    ) {}

    /**
     * The verse text, wrapped in quotes when an opening quote is given.
     * Known pairs close with their match (“ → ”); anything else closes with the same character.
     */
    public function text(?string $quote = null): string
    {
        if ($quote === null) {
            return $this->text;
        }

        return $quote.$this->text.(self::QUOTE_PAIRS[$quote] ?? $quote);
    }

    /**
     * "Book chapter:verse", e.g. "Matt 11:28", or "Matthew 11:28" when not short.
     */
    public function reference(bool $short = true): string
    {
        return "{$this->book(short: $short)} {$this->chapter}:{$this->verse}";
    }

    /**
     * The book name: short (e.g. "Matt") by default, long (e.g. "Matthew") otherwise.
     */
    public function book(bool $short = true): string
    {
        return $short ? (self::BOOKS[$this->book] ?? $this->book) : $this->book;
    }

    public function chapter(): int
    {
        return $this->chapter;
    }

    /**
     * The verse as stored, e.g. "28" or "1-3".
     */
    public function verse(): string
    {
        return $this->verse;
    }

    /**
     * A link to the passage, e.g. https://www.esv.org/Matthew+11:28/.
     */
    public function url(): string
    {
        return sprintf(self::URL, urlencode($this->book(short: false)), $this->chapter, urlencode($this->verse));
    }
}
