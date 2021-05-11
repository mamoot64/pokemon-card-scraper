<?php

declare(strict_types=1);

namespace Scraper\Domain;

final class Information
{
    private string $cardNumber;
    private string $rarity;
    private string $illustrator;

    public function __construct(string $cardNumber, string $rarity, string $illustrator)
    {
        $this->cardNumber = $cardNumber;
        $this->rarity = $rarity;
        $this->illustrator = $illustrator;
    }

    public function getCardNumber(): string
    {
        return $this->cardNumber;
    }

    public function getRarity(): string
    {
        return $this->rarity;
    }

    public function getIllustrator(): string
    {
        return $this->illustrator;
    }
}
