<?php

declare(strict_types=1);

namespace Scraper\Extractor\Collector;

use Scraper\DTO\PokemonDataDto;
use Scraper\Extractor\Pokemon\AbilityExtractor;
use Scraper\Extractor\Pokemon\AttackExtractor;
use Scraper\Extractor\Pokemon\EvolutionOfExtractor;
use Scraper\Extractor\Pokemon\HealthPointExtractor;
use Scraper\Extractor\Pokemon\PokemonTypeExtractor;
use Scraper\Extractor\Pokemon\ResistanceExtractor;
use Scraper\Extractor\Pokemon\RetreatCostExtractor;
use Scraper\Extractor\Pokemon\WeaknessExtractor;

final class PokemonCollector extends AbstractCollector
{
    public function __invoke(): PokemonDataDto
    {
        return new PokemonDataDto(
            $this->extractedData[EvolutionOfExtractor::EXTRACT_KEY],
            $this->extractedData[PokemonTypeExtractor::EXTRACT_KEY],
            $this->extractedData[HealthPointExtractor::EXTRACT_KEY],
            $this->extractedData[AbilityExtractor::EXTRACT_KEY],
            $this->extractedData[WeaknessExtractor::EXTRACT_KEY_WEAKNESS_TYPE],
            $this->extractedData[WeaknessExtractor::EXTRACT_KEY_WEAKNESS_ENERGY_COUNT],
            $this->extractedData[ResistanceExtractor::EXTRACT_KEY_TYPE],
            $this->extractedData[ResistanceExtractor::EXTRACT_KEY_COST],
            $this->extractedData[RetreatCostExtractor::EXTRACT_KEY],
            $this->extractedData[AttackExtractor::EXTRACT_KEY],
        );
    }

    public function getExtractorDirectory(): string
    {
        return 'pokemon';
    }
}
