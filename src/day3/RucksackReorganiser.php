<?php

declare(strict_types=1);

namespace App\day3;

final class RucksackReorganiser
{
    private \SplFileObject $dataFile;

    public function __construct(bool $useControlData = false)
    {
        $this->dataFile = $useControlData ?
            new \SplFileObject(__DIR__ . '/../data/day3control.txt') :
            new \SplFileObject(__DIR__ . '/../data/day3.txt');
        $this->dataFile->setFlags(\SplFileObject::SKIP_EMPTY|\SplFileObject::DROP_NEW_LINE);
    }

    public function getPrioritiesSum(): int
    {
        $priorities = array_flip([
            '',
            ...range('a', 'z'),
            ...range('A', 'Z'),
        ]);

        $sum = 0;
        while (!$this->dataFile->eof()) {
            $line = $this->dataFile->fgets();
            $middle = strlen($line) / 2;
            $first = substr($line, 0, $middle);
            $last = substr($line, $middle);

            $repeatingChar = array_slice(array_intersect(str_split($first), str_split($last)), 0)[0];
            $sum += $priorities[$repeatingChar];
        }

        return $sum;
    }
}
