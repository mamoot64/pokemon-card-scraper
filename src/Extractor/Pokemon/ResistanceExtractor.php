<?php

declare(strict_types=1);

namespace Scraper\Extractor\Pokemon;

use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;

final class ResistanceExtractor extends BaseExtractor implements ExtractorInterface
{
    public const EXTRACT_KEY_TYPE = "resistanceType";
    public const EXTRACT_KEY_COST = "resistanceCost";

    public function extract(): array
    {
        $resistanceType = $this->crawler->filter('.pokemon-stats > div:nth-child(2) > ul > li > a');
        $resistanceCost = $this->crawler->filter('.pokemon-stats > div:nth-child(2) > ul > li');

        return [
          self::EXTRACT_KEY_TYPE => $resistanceType->count() ? $this->extractEnergyType($resistanceType->html()) : null,
          self::EXTRACT_KEY_COST => $resistanceType->count() ? (int) $this->cleanString($resistanceCost->text()) : null,
        ];
    }
}
