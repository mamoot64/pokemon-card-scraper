<?php

declare(strict_types=1);

namespace Scraper\Domain;

use Scraper\DTO\CommonDataDto;

class BaseCard
{
    private string $cardName;
    private string $imageCardUrl;
    private string $masterType;
    private string $subType;
    private Extension $extension;
    private Information $information;

    public function __construct(CommonDataDto $commonDataDto)
    {
        $this->cardName = $commonDataDto->getCardName();
        $this->imageCardUrl = $commonDataDto->getImageCardUrl();
        $this->masterType = $commonDataDto->getMasterType();
        $this->subType = $commonDataDto->getSubType();
        $this->extension = new Extension($commonDataDto->getExtensionName(), $commonDataDto->getExtensionIconUrl());
        $this->information = new Information($commonDataDto->getCardNumber(), $commonDataDto->getRarity(), $commonDataDto->getIllustrator());
    }

    public function getCardName(): string
    {
        return $this->getCardName();
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

    public function getExtension(): Extension
    {
        return $this->extension;
    }

    public function getInformation(): Information
    {
        return $this->information;
    }
}
