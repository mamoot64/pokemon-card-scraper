<?php

declare(strict_types=1);

namespace Scraper\Extractor\Pokemon;

use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;

final class PokemonTypeExtractor extends BaseExtractor implements ExtractorInterface
{
    public const EXTRACT_KEY = "pokemonType";

    public function extract(): array
    {
        return [
          self::EXTRACT_KEY => $this->extractEnergyType($this->crawler->filter('.card-basic-info .right a')->html()),
        ];
    }
}
