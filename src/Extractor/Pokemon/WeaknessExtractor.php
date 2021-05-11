<?php

declare(strict_types=1);

namespace Scraper\Extractor\Pokemon;

use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;

final class WeaknessExtractor extends BaseExtractor implements ExtractorInterface
{
    public const EXTRACT_KEY_WEAKNESS_TYPE = "weaknessEnergyType";
    public const EXTRACT_KEY_WEAKNESS_ENERGY_COUNT = "weaknessEnergyCount";

    public function extract(): array
    {
        return [
          self::EXTRACT_KEY_WEAKNESS_TYPE => $this->extractEnergyType($this->crawler->filter('.pokemon-stats > div:nth-child(1) ul li:nth-child(1)')->html()),
          self::EXTRACT_KEY_WEAKNESS_ENERGY_COUNT => (int) $this->crawler->filter('.pokemon-stats .stat.last ul li')->count(),
        ];
    }
}
