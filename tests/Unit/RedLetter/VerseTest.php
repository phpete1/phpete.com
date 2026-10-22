<?php

use App\RedLetter\Verse;

function matthew(): Verse
{
    return new Verse(
        text: 'Come to me, all who labor and are heavy laden, and I will give you rest.',
        book: 'Matthew',
        chapter: 11,
        verse: '28',
    );
}

function johnRange(): Verse
{
    return new Verse(
        text: 'Let not your hearts be troubled.',
        book: 'John',
        chapter: 14,
        verse: '1-3',
    );
}

test('the text has no quotes by default', function () {
    expect(matthew()->text())->toStartWith('Come')->toEndWith('rest.');
});

test('a straight quote wraps both ends', function () {
    expect(johnRange()->text(quote: '"'))->toBe('"Let not your hearts be troubled."');
});

test('a curly quote closes with its pair', function () {
    expect(johnRange()->text(quote: '“'))->toBe('“Let not your hearts be troubled.”');
    expect(johnRange()->text(quote: '„'))->toBe('„Let not your hearts be troubled.“');
});

test('an unknown quote character wraps both ends', function () {
    expect(johnRange()->text(quote: '`'))->toBe('`Let not your hearts be troubled.`');
});

test('the book is short by default', function () {
    expect(matthew()->book())->toBe('Matt')
        ->and(matthew()->book(short: true))->toBe('Matt')
        ->and(matthew()->book(short: false))->toBe('Matthew');
});

test('the reference is short by default', function () {
    expect(matthew()->reference())->toBe('Matt 11:28')
        ->and(matthew()->reference(short: true))->toBe('Matt 11:28')
        ->and(matthew()->reference(short: false))->toBe('Matthew 11:28');
});

test('a verse range is kept as written', function () {
    expect(johnRange()->verse())->toBe('1-3')
        ->and(johnRange()->chapter())->toBe(14)
        ->and(johnRange()->reference(short: false))->toBe('John 14:1-3');
});

test('the url is built from the long book name', function () {
    expect(matthew()->url())->toBe('https://www.esv.org/Matthew+11:28/');
});

test('the url handles verse ranges and numbered books', function () {
    expect(johnRange()->url())->toBe('https://www.esv.org/John+14:1-3/');

    $peter = new Verse(text: 'He himself bore our sins.', book: '1 Peter', chapter: 2, verse: '24');

    expect($peter->url())->toBe('https://www.esv.org/1+Peter+2:24/')
        ->and($peter->reference())->toBe('1 Pet 2:24');
});
