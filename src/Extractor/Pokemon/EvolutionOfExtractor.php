<?php

declare(strict_types=1);

namespace Scraper\Extractor\Pokemon;

use Scraper\Domain\Stage;
use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;

final class EvolutionOfExtractor extends BaseExtractor implements ExtractorInterface
{
    public const EXTRACT_KEY = "evolutionOf";

    public function extract(): array
    {
        $evolutionOf = $this->crawler->filter('.card-basic-info .card-type h4 a');

        return [
          self::EXTRACT_KEY => $evolutionOf->count() > 0 ? $this->cleanString($evolutionOf->text()) : Stage::BASIC,
        ];
    }
}
