<?php

declare(strict_types=1);

namespace Tests\day3;

use App\day3\RucksackReorganiser;
use PHPUnit\Framework\TestCase;

final class RucksackReorganiserTest extends TestCase
{
    public function testItReturnsTheExpectedResultFromControlData(): void
    {
        $sut = new RucksackReorganiser(true);
        $this->assertSame(157, $sut->getPrioritiesSum());
    }

    public function testItReturnsTheExpectedResultFromActualData(): void
    {
        $sut = new RucksackReorganiser();
        $this->assertSame(7848, $sut->getPrioritiesSum());
    }

    public function testItReturnsTheExpectedResultFromControlDataPart2(): void
    {
        $sut = new RucksackReorganiser(true);
        $this->assertSame(70, $sut->getGroupPrioritiesSum());
    }

    public function testItReturnsTheExpectedResultFromActualDataPart2(): void
    {
        $sut = new RucksackReorganiser();
        $this->assertSame(2616, $sut->getGroupPrioritiesSum());
    }
}
