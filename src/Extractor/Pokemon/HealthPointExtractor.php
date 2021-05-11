<?php

declare(strict_types=1);

namespace Scraper\Extractor\Pokemon;

use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;

final class HealthPointExtractor extends BaseExtractor implements ExtractorInterface
{
    public const EXTRACT_KEY = "healthPoint";

    public function extract(): array
    {
        $healthPoint = $this->crawler->filter('.card-basic-info .right .card-hp')->text();
        return [
          self::EXTRACT_KEY => (int) preg_replace('/\D/', '', $healthPoint),
        ];
    }
}
