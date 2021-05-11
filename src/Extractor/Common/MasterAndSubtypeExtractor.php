<?php

declare(strict_types=1);

namespace Scraper\Extractor\Common;

use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;

class MasterAndSubtypeExtractor extends BaseExtractor implements ExtractorInterface
{
    public const MASTER_TYPE_KEY = "masterType";
    public const SUB_TYPE_KEY = "subType";

    private array $masterAndSubType = [];

    public function extract(): array
    {
        $this->extractMasterAndSubType(
            $this->crawler->filter('.card-basic-info .card-type h2')->text()
        );

        return [
          self::MASTER_TYPE_KEY => $this->getMasterType(),
          self::SUB_TYPE_KEY => $this->getSubType(),
        ];
    }

    public function getMasterType(): string
    {
        return $this->getType(0);
    }

    public function getSubType(): string
    {
        return $this->getType(1);
    }

    private function getType(int $index): string
    {
        return isset($this->masterAndSubType[$index]) ? trim($this->masterAndSubType[$index]) : 'Unknown';
    }

    private function extractMasterAndSubType(string $stringToAnalyze): void
    {
        $isTreated = false;

        // Use case: Dresseur - Stade, Dresseur - Object, Pokémon-V, Pokémon-VMAX
        if (\strpos($stringToAnalyze, '-')) {
            $this->masterAndSubType = \explode('-', $stringToAnalyze);
            $isTreated = true;
        }

        //Use case: Dresseur [Outil Pokémon]
        if (\strpos($stringToAnalyze, '[')) {
            \preg_match_all("#^([a-zA-Z]+) \[(.*)\]$#", $stringToAnalyze, $typeParts);
            \array_shift($typeParts);
            $this->masterAndSubType = array_merge(...array_values($typeParts));
            $isTreated = true;
        }

        // Use case : Pokémon Niveau 1, Pokémon Niveau 2, Pokémon de base
        if (!$isTreated) {
            $this->masterAndSubType = preg_split("#\s+#", $stringToAnalyze, 2);
        }
    }
}
