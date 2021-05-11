<?php

declare(strict_types=1);

namespace Scraper\Domain;

final class Weakness
{
    private ?string $energyType;
    private ?int $energyCost;

    public function __construct(?string $energyType, ?int $energyCost)
    {
        $this->energyType = $energyType;
        $this->energyCost = $energyCost;
    }

    public function hasWeakness(): bool
    {
        return null !== $this->energyType && null !== $this->energyCost;
    }

    public function getEnergyType(): ?string
    {
        return $this->energyType;
    }

    public function getEnergyCost(): ?int
    {
        return $this->energyCost;
    }
}
