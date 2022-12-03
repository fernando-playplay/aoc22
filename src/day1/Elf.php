<?php

namespace App\day1;

final class Elf
{
    public readonly int $totalCalories;

    public function __construct(array $carryingCalories)
    {
        $this->totalCalories = array_sum($carryingCalories);
    }
}
