<?php

declare(strict_types=1);

namespace Scraper\Extractor\Common;

use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;

final class ExtensionExtractor extends BaseExtractor implements ExtractorInterface
{
    public const EXTRACT_KEY_NAME = "extensionName";
    public const EXTRACT_KEY_ICON_URL = "extensionIcon";

    public function extract(): array
    {
        $backgroundUrl = $this->crawler->filter('.pokemon-stats .expansion a i')->attr('style');
        preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $backgroundUrl, $urls);

        return [
          self::EXTRACT_KEY_NAME => $this->crawler->filter('.pokemon-stats .stats-footer h3 a')->text(),
          self::EXTRACT_KEY_ICON_URL => array_shift($urls[0]),
        ];
    }
}
