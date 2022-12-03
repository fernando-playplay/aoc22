<?php

namespace App\day1;

use App\Common\Quicksort;

final class ElfCalorieCounter
{
    /** @var Elf[] */
    private array $elves;

    private \SplFileObject $dataFile;

    public function __construct(bool $useControlData = false)
    {
        $this->dataFile = $useControlData ? new \SplFileObject(__DIR__ . '/../data/day1control.txt') : new \SplFileObject(__DIR__ . '/../data/day1.txt');
        $this->loadElves();
    }

    private function loadElves(): void
    {
        $tmp = [];
        while(!$this->dataFile->eof()) {
            $calories = (int) $this->dataFile->fgets();
            if ($calories === 0) {
                $this->elves[] = new Elf($tmp);
                $tmp = [];
                continue;
            }
            $tmp[] = $calories;
        }
    }

    public function getMostCalories(): int
    {
        return max(array_map(static fn(Elf $elf) => $elf->totalCalories, $this->elves));
    }

    public function getTopThreeCalorieCount(): int
    {
        return array_sum(array_slice((new Quicksort())(array_map(static fn(Elf $elf) => $elf->totalCalories, $this->elves)), 0, 3));
    }
}
