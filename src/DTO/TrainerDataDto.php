<?php

declare(strict_types=1);

namespace Scraper\DTO;

final class TrainerDataDto
{
    private string $rule;

    public function __construct(
        string $rule,
    ) {
        $this->rule = $rule;
    }

    public function getRule(): string
    {
        return $this->rule;
    }
}
