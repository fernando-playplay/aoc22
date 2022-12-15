<?php

declare(strict_types=1);

namespace Tests\day5;

use App\day5\SupplyStacks;
use PHPUnit\Framework\TestCase;

final class SupplyStacksTest extends TestCase
{
    public function testItReturnsTheExpectedResultFromControlData(): void
    {
        $sut = new SupplyStacks(true);
        $this->assertSame('CMZ', $sut->getStackOrderingMessage());
    }

    public function testItReturnsTheExpectedResultFromActualData(): void
    {
        $sut = new SupplyStacks();
        $this->assertSame('FJSRQCFTN', $sut->getStackOrderingMessage());
    }

    public function testItReturnsTheExpectedResultFromControlDataPart2(): void
    {
        $sut = new SupplyStacks(true);
        $this->assertSame('MCD', $sut->getStackOrderingMessageCrateMover9001());
    }

    public function testItReturnsTheExpectedResultFromActualDataPart2(): void
    {
         $sut = new SupplyStacks();
         $this->assertSame('CJVLJQPHS', $sut->getStackOrderingMessageCrateMover9001());
    }
}
