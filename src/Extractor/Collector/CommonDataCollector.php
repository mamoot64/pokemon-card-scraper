<?php

declare(strict_types=1);

namespace Scraper\Extractor\Collector;

use Scraper\DTO\CommonDataDto;
use Scraper\Extractor\Common\CardNameExtractor;
use Scraper\Extractor\Common\CardNumberExtractor;
use Scraper\Extractor\Common\ExtensionExtractor;
use Scraper\Extractor\Common\IllustratorExtractor;
use Scraper\Extractor\Common\ImageUrlExtractor;
use Scraper\Extractor\Common\MasterAndSubtypeExtractor;
use Scraper\Extractor\Common\RarityExtractor;

final class CommonDataCollector extends AbstractCollector
{
    public function __invoke(): CommonDataDto
    {
        return new CommonDataDto(
            $this->extractedData[CardNameExtractor::EXTRACT_KEY],
            $this->extractedData[ImageUrlExtractor::EXTRACT_KEY],
            $this->extractedData[MasterAndSubtypeExtractor::MASTER_TYPE_KEY],
            $this->extractedData[MasterAndSubtypeExtractor::SUB_TYPE_KEY],
            $this->extractedData[CardNumberExtractor::EXTRACT_KEY],
            $this->extractedData[IllustratorExtractor::EXTRACT_KEY],
            $this->extractedData[RarityExtractor::EXTRACT_KEY],
            $this->extractedData[ExtensionExtractor::EXTRACT_KEY_NAME],
            $this->extractedData[ExtensionExtractor::EXTRACT_KEY_ICON_URL]
        );
    }

    public function getExtractorDirectory(): string
    {
        return 'common';
    }
}
