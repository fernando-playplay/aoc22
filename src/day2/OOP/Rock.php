<?php

declare(strict_types=1);

namespace App\day2\OOP;

final class Rock implements Shape
{
    public function __construct(public readonly int $value = 1)
    {
    }

    public function win(): Shape
    {
        return new Scissors();
    }

    public function draw(): Shape
    {
        return new Rock();
    }

    public function lose(): Shape
    {
        return new Paper();
    }
}
