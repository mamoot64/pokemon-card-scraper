<?php

declare(strict_types=1);

namespace Scraper\Domain;

final class Extension
{
    private string $extensionName;
    private string $extensionIconUrl;

    public function __construct(string $extensionName, string $extensionIconUrl)
    {
        $this->extensionName = $extensionName;
        $this->extensionIconUrl = $extensionIconUrl;
    }

    public function getExtensionName(): string
    {
        return $this->extensionName;
    }

    public function getExtensionIconUrl(): string
    {
        return $this->extensionIconUrl;
    }
}
