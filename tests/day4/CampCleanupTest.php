<?php

declare(strict_types=1);

namespace Tests\day4;

use App\day2\SecondYankenpoTournament;
use App\day2\YankenpoTournament;
use App\day3\RucksackReorganiser;
use App\day4\CampCleanup;
use PHPUnit\Framework\TestCase;

final class CampCleanupTest extends TestCase
{
    public function testItReturnsTheExpectedResultFromControlData(): void
    {
        $sut = new CampCleanup(true);
        $this->assertSame(2, $sut->getNumberOfOverlappingPairs());
    }

    public function testItReturnsTheExpectedResultFromActualData(): void
    {
        $sut = new CampCleanup();
        $this->assertSame(528, $sut->getNumberOfOverlappingPairs());
    }

    public function testItReturnsTheExpectedResultFromControlDataPart2(): void
    {
        $sut = new CampCleanup(true);
        $this->assertSame(4, $sut->getNumberOfOverlappingPairsWithAtLeastASingleItemOverlap());
    }

    public function testItReturnsTheExpectedResultFromActualDataPart2(): void
    {
        $sut = new CampCleanup();
        $this->assertSame(881, $sut->getNumberOfOverlappingPairsWithAtLeastASingleItemOverlap());
    }
}
