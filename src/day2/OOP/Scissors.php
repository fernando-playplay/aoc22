<?php

declare(strict_types=1);

namespace App\day2\OOP;

final class Scissors implements Shape
{
    public function __construct(public readonly int $value = 3)
    {
    }

    public function win(): Shape
    {
        return new Paper();
    }

    public function draw(): Shape
    {
        return new Scissors();
    }

    public function lose(): Shape
    {
        return new Rock();
    }
}
