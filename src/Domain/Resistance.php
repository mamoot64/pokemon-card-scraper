<?php

declare(strict_types=1);

namespace Scraper\Domain;

final class Resistance
{
    private ?string $resistanceType;
    private ?int $resistanceCost;

    public function __construct(?string $resistanceType, ?int $resistanceCost)
    {
        $this->resistanceType = $resistanceType;
        $this->resistanceCost = $resistanceCost;
    }

    public function hasResistance(): bool
    {
        return null !== $this->resistanceType && null !== $this->resistanceCost;
    }

    public function getResistanceType(): ?string
    {
        return $this->resistanceType;
    }

    public function getResistanceCost(): ?int
    {
        return $this->resistanceCost;
    }
}
