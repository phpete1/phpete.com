<?php

use App\RedLetter\RedLetterRepository;
use App\RedLetter\Verse;

/**
 * @return list<array{text: string, book: string, chapter: int, verse: string}>
 */
function numberedVerses(int $count): array
{
    return array_map(
        fn (int $i): array => ['text' => "verse {$i}", 'book' => 'John', 'chapter' => 1, 'verse' => (string) ($i + 1)],
        range(0, $count - 1),
    );
}

test('it rotates when there are fewer verses than days', function () {
    $repository = new RedLetterRepository(verses: numberedVerses(count: 5));

    expect($repository->forDate(date: new DateTimeImmutable('2026-01-01'))->text())->toBe('verse 0')
        ->and($repository->forDate(date: new DateTimeImmutable('2026-01-06'))->text())->toBe('verse 0')
        ->and($repository->forDate(date: new DateTimeImmutable('2026-01-08'))->text())->toBe('verse 2');
});

test('it looks up the first and last day of the year', function () {
    $repository = new RedLetterRepository(verses: numberedVerses(count: 366));

    expect($repository->forDate(date: new DateTimeImmutable('2026-01-01'))->text())->toBe('verse 0')
        ->and($repository->forDate(date: new DateTimeImmutable('2026-12-31'))->text())->toBe('verse 364');
});

test('a leap year 31 december uses the last verse', function () {
    $repository = new RedLetterRepository(verses: numberedVerses(count: 366));

    expect($repository->forDate(date: new DateTimeImmutable('2028-12-31'))->text())->toBe('verse 365');
});

test('it keeps a verse range as written', function () {
    $repository = new RedLetterRepository(verses: [
        ['text' => 'Let not your hearts be troubled.', 'book' => 'John', 'chapter' => 14, 'verse' => '1-3'],
    ]);

    $verse = $repository->forDate(date: new DateTimeImmutable('2026-03-15'));

    expect($verse->verse())->toBe('1-3')
        ->and($verse->url())->toBe('https://www.esv.org/John+14:1-3/');
});

test('today is the verse for the current date', function () {
    $repository = new RedLetterRepository(verses: numberedVerses(count: 366));

    expect($repository->today())->toEqual($repository->forDate(date: new DateTimeImmutable));
});

test('it loads the bundled verses by default', function () {
    expect((new RedLetterRepository)->today())->toBeInstanceOf(Verse::class);
});
