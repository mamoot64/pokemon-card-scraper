<?php

declare(strict_types=1);

namespace Scraper\Domain;

use Scraper\DTO\CommonDataDto;
use Scraper\DTO\PokemonDataDto;

final class PokemonCard extends BaseCard implements CardInterface
{
    private string $evolutionOf;
    private string $pokemonType;
    private int $healthPoint;
    private int $retreatCost;

    /**
     * @var array<string, string>|null
     */
    private ?array $ability;

    /**
     * @var Attack[]|null
     */
    private ?array $attacks;

    private Weakness $weakness;
    private Resistance $resistance;

    public function __construct(CommonDataDto $commonDataDto, PokemonDataDto $pokemonDataDto)
    {
        parent::__construct($commonDataDto);

        $this->evolutionOf = $pokemonDataDto->getEvolutionOf();
        $this->pokemonType = $pokemonDataDto->getPokemonType();
        $this->healthPoint = $pokemonDataDto->getHealthPoint();
        $this->ability = $pokemonDataDto->getAbility();
        $this->retreatCost = $pokemonDataDto->getRetreatCost();
        $this->attacks = $pokemonDataDto->getAttacks();
        $this->weakness = new Weakness($pokemonDataDto->getWeaknessEnergyType(), $pokemonDataDto->getWeaknessEnergyCount());
        $this->resistance = new Resistance($pokemonDataDto->getResistanceType(), $pokemonDataDto->getResistanceCost());
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

    public function getWeakness(): Weakness
    {
        return $this->weakness;
    }

    public function getResistance(): Resistance
    {
        return $this->resistance;
    }
}
