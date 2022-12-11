<?php

declare(strict_types=1);

namespace Tests\day2;

use App\day2\SecondYankenpoTournament;
use App\day2\YankenpoTournament;
use PHPUnit\Framework\TestCase;

final class YankenpoTournamentTest extends TestCase
{
    public function testItReturnsTheExpectedResultFromControlData(): void
    {
        $sut = new YankenpoTournament(true);
        $this->assertSame(15, $sut->getTotalScore());
    }

    public function testItReturnsTheExpectedResultFromActualData(): void
    {
        $sut = new YankenpoTournament();
        $this->assertSame(12855, $sut->getTotalScore());
    }

    public function testItReturnsTheExpectedResultFromControlDataPart2(): void
    {
        $sut = new SecondYankenpoTournament(true);
        $this->assertSame(12, $sut->getTotalScore());
    }

    public function testItReturnsTheExpectedResultFromActualDataPart2(): void
    {
        $sut = new SecondYankenpoTournament();
        $this->assertSame(13726, $sut->getTotalScore());
    }
}
