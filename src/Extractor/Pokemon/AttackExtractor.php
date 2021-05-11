<?php

declare(strict_types=1);

namespace Scraper\Extractor\Pokemon;

use Scraper\Domain\Attack;
use Scraper\Extractor\BaseExtractor;
use Scraper\Extractor\ExtractorInterface;
use Symfony\Component\DomCrawler\Crawler;

final class AttackExtractor extends BaseExtractor implements ExtractorInterface
{
    public const EXTRACT_KEY = "attacks";

    public function extract(): array
    {
        return [
          self::EXTRACT_KEY => $this->crawler->filter('.pokemon-abilities .ability')->each(function (Crawler $ability) {
              $details = [
                'name' => $ability->filter('h4')->text(),
                'damage' => $ability->filter('p')->count() === 0 ? ($ability->filter('span.plus')->count() === 1 ? (int) $ability->filter('span.plus')->text() : null) : null,
                'description' => $ability->filter('p')->count() > 0 ? $ability->filter('p')->text() : $ability->filter('pre')->text(),
              ];

              if ($ability->filter('ul.left')->count() === 1) {
                  $details['cost'] = $ability->filter('ul.left li a')->each(function (Crawler $costDetails) {
                      return $this->extractEnergyType($costDetails->html());
                  });
              }

              return new Attack(
                  $details['name'],
                  $details['damage'],
                  $details['description'],
                  $details['cost'] ?? null
              );
          })
        ];
    }
}
