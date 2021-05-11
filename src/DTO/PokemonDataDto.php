<?php

declare(strict_types=1);

namespace Scraper\DTO;

use Scraper\Domain\Attack;

final class PokemonDataDto
{
    private string $evolutionOf;
    private string $pokemonType;
    private int $healthPoint;
    private string $weaknessEnergyType;
    private int $weaknessEnergyCount;
    private ?string $resistanceType;
    private ?int $resistanceCost;
    private int $retreatCost;

    /**
     * @var Attack[]|null
     */
    private ?array $attacks;

    /**
     * @var array<string, string>|null
     */
    private ?array $ability;

    /**
     * PokemonDataDto constructor.
     *
     * @param string $evolutionOf
     * @param string $pokemonType
     * @param int $healthPoint
     * @param array<string, string>|null $ability
     * @param string $weaknessEnergyType
     * @param int $weaknessEnergyCount
     * @param string|null $resistanceType
     * @param int|null $resistanceCost
     * @param int $retreatCost
     * @param Attack[]|null $attacks
     */
    public function __construct(
        string $evolutionOf,
        string $pokemonType,
        int $healthPoint,
        ?array $ability,
        string $weaknessEnergyType,
        int $weaknessEnergyCount,
        ?string $resistanceType,
        ?int $resistanceCost,
        int $retreatCost,
        ?array $attacks
    ) {
        $this->evolutionOf = $evolutionOf;
        $this->pokemonType = $pokemonType;
        $this->healthPoint = $healthPoint;
        $this->ability = $ability;
        $this->weaknessEnergyType = $weaknessEnergyType;
        $this->weaknessEnergyCount = $weaknessEnergyCount;
        $this->resistanceType = $resistanceType;
        $this->resistanceCost = $resistanceCost;
        $this->retreatCost = $retreatCost;
        $this->attacks = $attacks;
    }

    public function getEvolutionOf(): string
    {
        return $this->evolutionOf;
    }

    public function getPokemonType(): string
    {
        return $this->pokemonType;
    }

    public function getHealthPoint(): int
    {
        return $this->healthPoint;
    }

    /**
     * @return array<string, string>|null
     */
    public function getAbility(): ?array
    {
        return $this->ability;
    }

    public function getWeaknessEnergyType(): string
    {
        return $this->weaknessEnergyType;
    }

    public function getWeaknessEnergyCount(): int
    {
        return $this->weaknessEnergyCount;
    }

    public function getRetreatCost(): int
    {
        return $this->retreatCost;
    }

    /**
     * @return Attack[]|null
     */
    public function getAttacks(): ?array
    {
        return $this->attacks;
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
