<?php

namespace Scraper\Tests\Unit\Domain;

use Scraper\Domain\Resistance;

it('check getter resistance Type and Cost', function ($type, $cost) {
  expect((new Resistance($type, $cost))->getResistanceType())->toEqual($type);
  expect((new Resistance($type, $cost))->getResistanceCost())->toEqual($cost);
})->with([
  ['Fighting', -10],
  [null, -30],
  ['Fighting', null],
  [null, null],
]);

it('check if Pokémon has resistance', function ($type, $cost, $expected) {
  expect((new Resistance($type, $cost))->hasResistance())->toBe($expected);
})->with([
  ['Fighting', -30, true],
  [null, -100, false],
  ['Fighting', null, false],
  [null, null, false],
]);