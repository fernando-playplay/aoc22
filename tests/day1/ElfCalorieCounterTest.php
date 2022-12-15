<?php

namespace Tests\day1;

use App\day1\ElfCalorieCounter;
use PHPUnit\Framework\TestCase;

final class ElfCalorieCounterTest extends TestCase
{
    public function testItReturnsTheExpectedResultFromControlData(): void
    {
        $sut = new ElfCalorieCounter(true);

        $this->assertSame(24000, $sut->getMostCalories());
    }

    public function testItReturnsTheExpectedResultFromActualData(): void
    {
        $sut = new ElfCalorieCounter();

        $this->assertSame(68442, $sut->getMostCalories());
    }

    public function testItReturnsTheSumOfCaloriesFromTop3FromControlData(): void
    {
        $sut = new ElfCalorieCounter();

        $this->assertSame(204837, $sut->getTopThreeCalorieCount());
    }
}
