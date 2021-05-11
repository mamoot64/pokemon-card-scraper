<?php

declare(strict_types=1);

namespace Scraper\DTO;

final class CommonDataDto
{
    private string $cardName;
    private string $imageCardUrl;
    private string $masterType;
    private string $subType;
    private string $cardNumber;
    private string $illustrator;
    private string $rarity;
    private string $extensionName;
    private string $extensionIconUrl;

    public function __construct(
        string $cardName,
        string $imageCardUrl,
        string $masterType,
        string $subType,
        string $cardNumber,
        string $illustrator,
        string $rarity,
        string $extensionName,
        string $extensionIconUrl
    ) {
        $this->cardName = $cardName;
        $this->imageCardUrl = $imageCardUrl;
        $this->masterType = $masterType;
        $this->subType = $subType;
        $this->cardNumber = $cardNumber;
        $this->illustrator = $illustrator;
        $this->rarity = $rarity;
        $this->extensionName = $extensionName;
        $this->extensionIconUrl = $extensionIconUrl;
    }

    public function getCardName(): string
    {
        return $this->cardName;
    }

    public function getImageCardUrl(): string
    {
        return $this->imageCardUrl;
    }

    public function getMasterType(): string
    {
        return $this->masterType;
    }

    public function getSubType(): string
    {
        return $this->subType;
    }

    public function getCardNumber(): string
    {
        return $this->cardNumber;
    }

    public function getIllustrator(): string
    {
        return $this->illustrator;
    }

    public function getRarity(): string
    {
        return $this->rarity;
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
