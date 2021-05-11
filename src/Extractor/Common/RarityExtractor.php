<?php

declare(strict_types=1);

namespace Scraper\Extractor\Common;

use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;

final class RarityExtractor extends BaseExtractor implements ExtractorInterface
{
    public const EXTRACT_KEY = "rarity";

    public function extract(): array
    {
        $rarity = $this->crawler->filter('.pokemon-stats .stats-footer span')->text();

        return [
            self::EXTRACT_KEY => trim(preg_filter('#(\d+)/(\d+)#', '', $rarity)),
        ];
    }
}
