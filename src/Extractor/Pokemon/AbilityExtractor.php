<?php

declare(strict_types=1);

namespace Scraper\Extractor\Pokemon;

use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;

final class AbilityExtractor extends BaseExtractor implements ExtractorInterface
{
    public const EXTRACT_KEY = "ability";

    public function extract(): array
    {
        $ability = $this->crawler->filter('.pokemon-abilities h3 div:nth-child(2)');

        return [
          self::EXTRACT_KEY => $ability->count() === 1 ? [
            'name' => $ability->text(),
            'effect' => $this->crawler->filter('.pokemon-abilities p')->text(),
          ] : null
        ];
    }
}
