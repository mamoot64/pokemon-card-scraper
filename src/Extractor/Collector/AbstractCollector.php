<?php

declare(strict_types=1);

namespace Scraper\Extractor\Collector;

use Scraper\Exception\ExtractorInterfaceNotImplementedException;
use Scraper\Extractor\ExtractorInterface;
use Symfony\Component\DomCrawler\Crawler;

abstract class AbstractCollector
{
    protected Crawler $crawler;

    /**
     * @var ExtractorInterface[]
     */
    protected array $extractors = [];

    /**
     * @var array<string, string|array|null>
     */
    protected array $extractedData = [];

    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;
        $this->registerDefaultExtractor();
        $this->assemble();
    }

    /**
     * Register one extractor.
     *
     * @param \Scraper\Extractor\ExtractorInterface $extractor
     */
    public function registerExtractor(ExtractorInterface $extractor): void
    {
        $this->extractors[] = $extractor;
    }

    /**
     * Register multiple extractors.
     *
     * @param ExtractorInterface[] $extractors
     *
     * @throws ExtractorInterfaceNotImplementedException
     */
    public function registerExtractors(array $extractors): void
    {
        foreach ($extractors as $extractor) {
            if (!$extractor instanceof ExtractorInterface) {
                throw new ExtractorInterfaceNotImplementedException(sprintf("The %s class doesn't implements %s", get_class($extractor), ExtractorInterface::class));
            }

            $this->extractors[] = $extractor;
        }
    }

    /**
     * Apply extract on each extractor and compute final result.
     */
    protected function assemble(): void
    {
        foreach ($this->extractors as $extractor) {
            $this->extractedData = array_merge_recursive($this->extractedData, $extractor->extract());
        }
    }

    /**
     * Retrieve and register all Extractors FQCN for a given Extractor namespace Directory.
     */
    protected function registerDefaultExtractor(): void
    {
        $extractors = glob(__DIR__ . '/../' . ucfirst($this->getExtractorDirectory()) . '/*Extractor.php');
        if ($extractors) {
            foreach ($extractors as $extractor) {
                $fqcn = sprintf("Scraper\\Extractor\\%s\\%s", ucfirst($this->getExtractorDirectory()), basename(pathinfo($extractor, PATHINFO_FILENAME)));
                $this->registerExtractor(new $fqcn($this->crawler));
            }
        }
    }

    /**
     * Provide Extractor directory namespace.
     *
     * @return string
     */
    abstract public function getExtractorDirectory(): string;
}
