# Pokémon Card Scraper

Simple PHP Pokémon card scraper based on [Goutte](https://github.com/FriendsOfPHP/Goutte) web scraper and solid Symfony Components (DomCrawler, BrowserKit and HttpClient).   
Unit tests are made with [Pest](https://github.com/pestphp/pest), an elegant wrapper around PHPUnit.

***Warning!***    
Project under "active" development.    
Seems working for "Sun and Moon" & "Sword And Shield" series.    

Some modelization elements need to be enhanced (ability, subtype, ...)    
Please, be patient ;)

Basic usage
-------

### Create the scraper instance
```php
use Goutte\Client;
use Scraper\PokemonCardScraper;

// We want to scrap Sword And Shield - Darkness Ablaze extension
$pokemonCardScraper = (new PokemonCardScraper(new Client()))
  ->setSerieCollection('ss-series')
  ->setCollectionCode('swsh3');
```

### And scrap!

```php
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
```
### Dump example

````php
^ Scraper\Domain\PokemonCard^ {#16
  -evolutionOf: "Basic"
  -pokemonType: "Water"
  -healthPoint: 30
  -retreatCost: 1
  -ability: null
  -attacks: array:1 [
    0 => Scraper\Domain\Attack^ {#74
      -name: "Tit’Sieste"
      -damage: null
      -description: "Soignez 20 dégâts de ce Pokémon."
      -cost: array:1 [
        0 => "Colorless"
      ]
    }
  ]
  -weakness: Scraper\Domain\Weakness^ {#58
    -energyType: "Lightning"
    -energyCost: 1
  }
  -resistance: Scraper\Domain\Resistance^ {#15
    -resistanceType: null
    -resistanceCost: null
  }
  -cardName: "Barpau"
  -imageCardUrl: "https://assets.pokemon.com/assets/cms2-fr-fr/img/cards/web/SWSH3/SWSH3_FR_38.png"
  -masterType: "Pokémon"
  -subType: "de base"
  -extension: Scraper\Domain\Extension^ {#66
    -extensionName: "Ténèbres Embrasées"
    -extensionIconUrl: "https://assets.pokemon.com/assets/cms-fr-fr/img/tcg/expansion-symbols/_40x40/swsh3-expansion-symbol.png"
  }
  -information: Scraper\Domain\Information^ {#78
    -cardNumber: "38/189"
    -rarity: "Common"
    -illustrator: "HYOGONOSUKE"
  }
}
````

### Available languages

fr / en / it / es / de

French (fr) is the default language.


### Execute test suite

If you want to run the tests you should run the following commands:

```terminal
git clone git@github.com:mamoot64/pokemon-card-scraper.git
cd pokemon-card-scraper
composer install
composer test
```

If you want to generate coverage with HTML report, run:   

```terminal
composer test-coverage-html
```