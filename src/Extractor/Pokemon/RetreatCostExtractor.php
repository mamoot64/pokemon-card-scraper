<?php

declare(strict_types=1);

namespace Scraper\Extractor\Pokemon;

use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;

final class RetreatCostExtractor extends BaseExtractor implements ExtractorInterface
{
    public const EXTRACT_KEY = "retreatCost";

    public function extract(): array
    {
        return [
          self::EXTRACT_KEY => (int) $this->crawler->filter('.pokemon-stats .stat.last ul li')->count(),
        ];
    }
}
