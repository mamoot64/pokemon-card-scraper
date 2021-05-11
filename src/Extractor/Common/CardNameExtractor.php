<?php

declare(strict_types=1);

namespace Scraper\Extractor\Common;

use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;

final class CardNameExtractor extends BaseExtractor implements ExtractorInterface
{
    public const EXTRACT_KEY = "cardName";

    public function extract(): array
    {
        return [
          self::EXTRACT_KEY => $this->crawler->filter('.card-description h1')->text(),
        ];
    }
}
