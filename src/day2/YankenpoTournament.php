<?php

declare(strict_types=1);

namespace App\day2;

final class YankenpoTournament
{
    private \SplFileObject $dataFile;

    public function __construct(bool $useControlData = false)
    {
        $this->dataFile = $useControlData ?
            new \SplFileObject(__DIR__ . '/../data/day2control.txt') :
            new \SplFileObject(__DIR__ . '/../data/day2.txt');
    }

    public function getTotalScore(): int
    {
        $shapeValue = [
            'X' => 1,
            'Y' => 2,
            'Z' => 3,
        ];
        $matchResult = [
            'A' => [
                'X' => 3,
                'Y' => 6,
                'Z' => 0,
            ],
            'B' => [
                'X' => 0,
                'Y' => 3,
                'Z' => 6,
            ],
            'C' => [
                'X' => 6,
                'Y' => 0,
                'Z' => 3,
            ],
        ];

        $score = 0;
        while (!$this->dataFile->eof()) {
            $round = str_split($this->dataFile->fgets());

            if (count($round) === 1) {
                break;
            }

            $score += $matchResult[$round[0]][$round[2]] + $shapeValue[$round[2]];
        }

        return $score;
    }
}
