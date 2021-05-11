<?php

declare(strict_types=1);

namespace Scraper\Extractor\Common;

use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;

final class IllustratorExtractor extends BaseExtractor implements ExtractorInterface
{
    public const EXTRACT_KEY = "illustrator";

    public function extract(): array
    {
        $illustrator = $this->crawler->filter('.illustrator h4 a');

        return [
          self::EXTRACT_KEY => $illustrator->count() === 1 ? $illustrator->text() : null,
        ];
    }
}
