<?php

namespace App\day2\OOP;

interface Shape
{
    public function win(): Shape;
    public function draw(): Shape;
    public function lose(): Shape;
}
