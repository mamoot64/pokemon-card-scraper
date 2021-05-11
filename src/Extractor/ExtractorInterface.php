<?php

declare(strict_types=1);

namespace Scraper\Extractor;

interface ExtractorInterface
{
    public function extract(): array;
}
