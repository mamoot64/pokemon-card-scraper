<?php

declare(strict_types=1);

namespace Scraper\Extractor\Trainer;

use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;

final class RuleExtractor extends BaseExtractor implements ExtractorInterface
{
    public const EXTRACT_KEY = "rule";

    public function extract(): array
    {
        return [
          self::EXTRACT_KEY => $this->crawler->filter('.pokemon-abilities > div > pre')->text(),
        ];
    }
}
