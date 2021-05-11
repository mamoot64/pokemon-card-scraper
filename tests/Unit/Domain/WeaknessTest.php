<?php

namespace Scraper\Tests\Unit\Domain;

use Scraper\Domain\Weakness;

it('check getter weakness Type and Cost', function ($type, $cost) {
  expect((new Weakness($type, $cost))->getEnergyType())->toEqual($type);
  expect((new Weakness($type, $cost))->getEnergyCost())->toEqual($cost);
})->with([
  ['Water', 1],
  [null, 1],
  ['Water', null],
  [null, null],
]);

it('check if Pokémon has weakness', function ($type, $cost, $expected) {
  expect((new Weakness($type, $cost))->hasWeakness())->toBe($expected);
})->with([
  ['Water', 1, true],
  [null, 1, false],
  ['Water', null, false],
  [null, null, false],
]);