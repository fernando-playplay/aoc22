<?php

declare(strict_types=1);

namespace App\day2\OOP;

final class Paper implements Shape
{
    public function __construct(public readonly int $value = 2)
    {
    }

    public function win(): Shape
    {
        return new Rock();
    }

    public function draw(): Shape
    {
        return new Paper();
    }

    public function lose(): Shape
    {
        return new Scissors();
    }
}
