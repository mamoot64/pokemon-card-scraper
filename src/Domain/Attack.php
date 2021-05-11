<?php

declare(strict_types=1);

namespace Scraper\Domain;

final class Attack
{
    private string $name;
    private ?int $damage;
    private ?string $description;

    /**
     * @var string[]|null
     */
    private ?array $cost;

    /**
     * Attack constructor.
     *
     * @param string $name
     * @param int|null $damage
     * @param string|null $description
     * @param string[]|null $cost
     */
    public function __construct(string $name, ?int $damage, ?string $description, ?array $cost)
    {
        $this->name = $name;
        $this->damage = $damage;
        $this->description = $description;
        $this->cost = $cost;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDamage(): ?int
    {
        return $this->damage;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return string[]|null
     */
    public function getCost(): ?array
    {
        return $this->cost;
    }
}
