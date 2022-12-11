<?php

declare(strict_types=1);

namespace App\day4;

final class CampCleanup
{
    private \SplFileObject $dataFile;

    public function __construct(bool $useControlData = false)
    {
        $this->dataFile = $useControlData ?
            new \SplFileObject(__DIR__ . '/../data/day4control.txt') :
            new \SplFileObject(__DIR__ . '/../data/day4.txt');
        $this->dataFile->setFlags(\SplFileObject::SKIP_EMPTY|\SplFileObject::DROP_NEW_LINE);
    }

    public function getNumberOfOverlappingPairs(): int
    {
        $numberOfOverlappingPairs = 0;
        while (!$this->dataFile->eof()) {
            $line = $this->dataFile->fgets();
            $ranges = $this->createRanges($line);

            if (count(array_diff(...$ranges)) === 0 || count(array_diff(...array_reverse($ranges))) === 0) {
                $numberOfOverlappingPairs++;
            }
        }

        return $numberOfOverlappingPairs;
    }

    public function getNumberOfOverlappingPairsWithAtLeastASingleItemOverlap(): int
    {
        $numberOfOverlappingPairs = 0;
        while (!$this->dataFile->eof()) {
            $line = $this->dataFile->fgets();
            $ranges = $this->createRanges($line);

            if (count(array_intersect(...$ranges)) !== 0) {
                $numberOfOverlappingPairs++;
            }
        }

        return $numberOfOverlappingPairs;
    }

    public function createRanges(string $line): array
    {
        $parts = explode(',', $line);

        return array_map(
            static function (string $i) {
                $range = explode('-', $i);
                return range($range[0], $range[1]);
            },
            $parts,
        );
    }
}
