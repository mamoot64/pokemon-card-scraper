<?php

declare(strict_types=1);

namespace Scraper\Domain;

use Scraper\DTO\CommonDataDto;
use Scraper\DTO\TrainerDataDto;

final class TrainerCard extends BaseCard implements CardInterface
{
    private string $rule;

    public function __construct(CommonDataDto $commonDataDto, TrainerDataDto $trainerDataDto)
    {
        parent::__construct($commonDataDto);

        $this->rule = $trainerDataDto->getRule();
    }

    public function getRule(): string
    {
        return $this->rule;
    }
}
