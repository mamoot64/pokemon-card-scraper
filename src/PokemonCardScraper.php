<?php

namespace Scraper;

use Scraper\Extractor\Collector\CommonDataCollector;
use Scraper\Extractor\Collector\PokemonCollector;
use Scraper\Extractor\Collector\TrainerCollector;
use Goutte\Client;
use Scraper\Domain\CardInterface;
use Scraper\Domain\PokemonCard;
use Scraper\Domain\TrainerCard;

class PokemonCardScraper
{
    private const EUROPEAN_POKEMON_WEBSITE_URL = 'https://www.pokemon.com/%s/%s/%s/%d/';

    private Client $scraperClient;
    private string $collectionCode;
    private int $cardNumber;
    private string $serieCollection;
    private string $language;

    public function __construct(Client $goutteClient)
    {
        $this->scraperClient = $goutteClient;
        $this->setLanguage();
    }

    /**
     * Scrap Pokemon Card details.
     *
     * @return CardInterface
     */
    public function scrap(): CardInterface
    {
        $crawler = $this->scraperClient->request(
            'GET',
            sprintf(self::EUROPEAN_POKEMON_WEBSITE_URL, $this->language, $this->serieCollection, $this->collectionCode, $this->cardNumber)
        );

        $commonCardData = (new CommonDataCollector($crawler))();
        if ($commonCardData->getMasterType() === "Pokémon") {
            $card = new PokemonCard(
                $commonCardData,
                (new PokemonCollector($crawler))()
            );
        } else {
            $card = new TrainerCard(
                $commonCardData,
                (new TrainerCollector($crawler))()
            );
        }

        return $card;
    }

    /**
     * Set the collection code of the serie.
     *
     * @param string $collectionCode
     *
     * @return PokemonCardScraper
     */
    public function setCollectionCode(string $collectionCode)
    {
        $this->collectionCode = $collectionCode;
        return $this;
    }

    /**
     * Set the card number to scrap.
     *
     * @param int $cardNumber
     *
     * @return PokemonCardScraper
     */
    public function setCardNumber(int $cardNumber)
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }

    /**
     * Set the collection serie.
     *
     * @param string $serieCollection
     *
     * @return $this
     */
    public function setSerieCollection(string $serieCollection)
    {
        $this->serieCollection = $serieCollection;
        return $this;
    }

    /**
     * Set the desired language.
     *
     * @param string $language
     *
     * @return $this
     */
    public function setLanguage(string $language = 'fr'): self
    {
        switch ($language) {
        case 'en': case 'uk':
          $this->language = 'uk/pokemon-tcg/pokemon-cards';
          break;
        case 'it':
          $this->language = 'it/gcc/archivio-carte';
          break;
        case 'es':
          $this->language = 'es/jcc-pokemon/cartas-pokemon';
          break;
        case 'de':
          $this->language = 'de/pokemon-sammelkartenspiel/pokemon-karten';
          break;
        case 'fr':default:
          $this->language = 'fr/jcc-pokemon/cartes-pokemon';
          break;
      }

        return $this;
    }
}
