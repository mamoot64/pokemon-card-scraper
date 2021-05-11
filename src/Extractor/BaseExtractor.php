<?php

declare(strict_types=1);

namespace Scraper\Extractor;

use Scraper\Domain\EnergyType;
use Symfony\Component\DomCrawler\Crawler;

class BaseExtractor
{
    protected Crawler $crawler;

    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;
    }

    /**
     * Remove unwanted characters (clean).
     *
     * @param string $stringToClean
     *
     * @return string
     */
    protected function cleanString(string $stringToClean): string
    {
        $cleanString = \preg_replace('/\s+/', '', $stringToClean);
        return null !== $cleanString ? \trim($cleanString) : $stringToClean;
    }

    /**
     * Retrieve the energy type from string.
     *
     * @param string $stringToAnalyze
     *
     * @return string
     */
    protected function extractEnergyType(string $stringToAnalyze): string
    {
        switch (true) {
          case \strpos($stringToAnalyze, 'grass'):
            return EnergyType::GRASS;
          case \strpos($stringToAnalyze, 'fire'):
            return EnergyType::FIRE;
          case \strpos($stringToAnalyze, 'water'):
            return EnergyType::WATER;
          case \strpos($stringToAnalyze, 'psychic'):
            return EnergyType::PSYCHIC;
          case \strpos($stringToAnalyze, 'metal'):
            return EnergyType::METAL;
          case \strpos($stringToAnalyze, 'dragon'):
            return EnergyType::DRAGON;
          case \strpos($stringToAnalyze, 'fairy'):
            return EnergyType::FAIRY;
          case \strpos($stringToAnalyze, 'lightning'):
            return EnergyType::LIGHTNING;
          case \strpos($stringToAnalyze, 'fighting'):
            return EnergyType::FIGHTING;
          case \strpos($stringToAnalyze, 'darkness'):
            return EnergyType::DARKNESS;
          case \strpos($stringToAnalyze, 'special'):
            return EnergyType::SPECIAL;
          default: case \strpos($stringToAnalyze, 'colorless'):
          return EnergyType::COLORLESS;
        }
    }
}
