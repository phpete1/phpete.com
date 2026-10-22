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
     * Long book names mapped to their short (SBL) form.
     *
     * @var array<string, string>
     */
    private const array BOOKS = [
        'Genesis' => 'Gen',
        'Exodus' => 'Exod',
        'Leviticus' => 'Lev',
        'Numbers' => 'Num',
        'Deuteronomy' => 'Deut',
        'Joshua' => 'Josh',
        'Judges' => 'Judg',
        'Ruth' => 'Ruth',
        '1 Samuel' => '1 Sam',
        '2 Samuel' => '2 Sam',
        '1 Kings' => '1 Kgs',
        '2 Kings' => '2 Kgs',
        '1 Chronicles' => '1 Chr',
        '2 Chronicles' => '2 Chr',
        'Ezra' => 'Ezra',
        'Nehemiah' => 'Neh',
        'Esther' => 'Esth',
        'Job' => 'Job',
        'Psalms' => 'Ps',
        'Proverbs' => 'Prov',
        'Ecclesiastes' => 'Eccl',
        'Song of Solomon' => 'Song',
        'Isaiah' => 'Isa',
        'Jeremiah' => 'Jer',
        'Lamentations' => 'Lam',
        'Ezekiel' => 'Ezek',
        'Daniel' => 'Dan',
        'Hosea' => 'Hos',
        'Joel' => 'Joel',
        'Amos' => 'Amos',
        'Obadiah' => 'Obad',
        'Jonah' => 'Jonah',
        'Micah' => 'Mic',
        'Nahum' => 'Nah',
        'Habakkuk' => 'Hab',
        'Zephaniah' => 'Zeph',
        'Haggai' => 'Hag',
        'Zechariah' => 'Zech',
        'Malachi' => 'Mal',
        'Matthew' => 'Matt',
        'Mark' => 'Mark',
        'Luke' => 'Luke',
        'John' => 'John',
        'Acts' => 'Acts',
        'Romans' => 'Rom',
        '1 Corinthians' => '1 Cor',
        '2 Corinthians' => '2 Cor',
        'Galatians' => 'Gal',
        'Ephesians' => 'Eph',
        'Philippians' => 'Phil',
        'Colossians' => 'Col',
        '1 Thessalonians' => '1 Thess',
        '2 Thessalonians' => '2 Thess',
        '1 Timothy' => '1 Tim',
        '2 Timothy' => '2 Tim',
        'Titus' => 'Titus',
        'Philemon' => 'Phlm',
        'Hebrews' => 'Heb',
        'James' => 'Jas',
        '1 Peter' => '1 Pet',
        '2 Peter' => '2 Pet',
        '1 John' => '1 John',
        '2 John' => '2 John',
        '3 John' => '3 John',
        'Jude' => 'Jude',
        'Revelation' => 'Rev',
    ];

    /**
     * @param  string  $book  The long book name, e.g. "Matthew".
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
