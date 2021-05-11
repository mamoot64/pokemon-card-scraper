<?php

declare(strict_types=1);

namespace Scraper\Extractor\Common;

use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;

class ImageUrlExtractor extends BaseExtractor implements ExtractorInterface
{
    public const EXTRACT_KEY = "imageUrl";

    public function extract(): array
    {
        $image = $this->crawler
      ->filter('.content-block.card-image img')
      ->extract(['src']);

        return [
          self::EXTRACT_KEY => array_shift($image),
        ];
    }
}
