<?php

declare(strict_types=1);

namespace App\day2;

use App\day2\OOP\Paper;
use App\day2\OOP\Rock;
use App\day2\OOP\Scissors;

final class SecondYankenpoTournament
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
        $rock = new Rock();
        $paper = new Paper();
        $scissors = new Scissors();
        $outcome = [
            'X' => 'lose',
            'Y' => 'draw',
            'Z' => 'win',
        ];
        $matchResult = [
            'win' => 6,
            'draw' => 3,
            'lose' => 0,
        ];
        $matchMaps = [
            'A' => [
                'draw' => $rock,
                'lose' => $scissors,
                'win' => $paper,
            ],
            'B' => [
                'draw' => $paper,
                'lose' => $rock,
                'win' => $scissors,
            ],
            'C' => [
                'draw' => $scissors,
                'lose' => $paper,
                'win' => $rock,
            ],
        ];

        $score = 0;
        $own = 2;
        $opponent = 0;
        while (!$this->dataFile->eof()) {
            $moves = str_split($this->dataFile->fgets());

            if (count($moves) === 1) {
                break;
            }

            $score +=
                $matchResult[$outcome[$moves[$own]]] + $matchMaps[$moves[$own]][$outcome[$moves[$opponent]]]->value;
        }

        return $score;
    }
}
