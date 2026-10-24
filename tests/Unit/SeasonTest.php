<?php

use App\Season;
use Illuminate\Support\Carbon;

test('dates fall in their meteorological season', function (string $date, Season $season) {
    expect(Season::of(Carbon::parse($date)))->toBe($season);
})->with([
    ['2026-02-28', Season::Winter],
    ['2026-03-01', Season::Spring],
    ['2026-05-31', Season::Spring],
    ['2026-06-01', Season::Summer],
    ['2026-08-31', Season::Summer],
    ['2026-09-01', Season::Autumn],
    ['2026-11-30', Season::Autumn],
    ['2026-12-01', Season::Winter],
    ['2027-01-15', Season::Winter],
]);
