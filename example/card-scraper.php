<?php

declare(strict_types=1);

use Goutte\Client;
use Scraper\PokemonCardScraper;

require_once dirname(__DIR__, 1) . '/vendor/autoload.php';

// Basic Usage
// We want to scrap Sword And Shield - Darkness Ablaze extension
$pokemonCardScraper = (new PokemonCardScraper(new Client()))
  ->setSerieCollection('ss-series')
  ->setCollectionCode('swsh3');

// Base Pokémon card
$baseCardDetails = $pokemonCardScraper->setCardNumber(120)->scrap();
dump($baseCardDetails);

// Evolutive Pokémon card
$evolutiveCardDetails = $pokemonCardScraper->setCardNumber(38)->scrap();
dump($evolutiveCardDetails);

// Trainer Pokémon card
$trainerCardDetails = $pokemonCardScraper->setCardNumber(160)->scrap();
dump($trainerCardDetails);

// Base Pokémon card in English
$baseCardDetailsInEnglish = $pokemonCardScraper->setLanguage('uk')->setCardNumber(1)->scrap();
dump($baseCardDetailsInEnglish);

// Evolutive Pokémon card in Italian
$evolutiveCardDetailsInItalien = $pokemonCardScraper->setLanguage('it')->setCardNumber(38)->scrap();
dump($evolutiveCardDetailsInItalien);

// Trainer Pokémon card in Spanish
$trainerCardDetailsInSpanish = $pokemonCardScraper->setLanguage('es')->setCardNumber(160)->scrap();
dump($trainerCardDetailsInSpanish);
