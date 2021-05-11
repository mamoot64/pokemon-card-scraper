<?php

declare(strict_types=1);

namespace Scraper\Extractor\Collector;

use Scraper\DTO\TrainerDataDto;
use Scraper\Extractor\Trainer\RuleExtractor;

final class TrainerCollector extends AbstractCollector
{
    public function __invoke(): TrainerDataDto
    {
        return new TrainerDataDto(
            $this->extractedData[RuleExtractor::EXTRACT_KEY],
        );
    }

    public function getExtractorDirectory(): string
    {
        return 'trainer';
    }
}
