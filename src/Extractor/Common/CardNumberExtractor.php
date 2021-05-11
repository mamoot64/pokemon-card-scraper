<?php

declare(strict_types=1);

namespace Scraper\Extractor\Common;

use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;

final class CardNumberExtractor extends BaseExtractor implements ExtractorInterface
{
    public const EXTRACT_KEY = "cardNumber";

    public function extract(): array
    {
        $cardNumber = $this->crawler->filter('.pokemon-stats .stats-footer span')->text();

        return [
          self::EXTRACT_KEY => trim(preg_filter('#([A-Za-z])#', '', $cardNumber)),
        ];
    }
}
