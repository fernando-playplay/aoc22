<?php

declare(strict_types=1);

namespace App\day5;

use PHPUnit\Util\Xml\ValidationResult;

final class SupplyStacks
{
    private \SplFileObject $dataFile;

    private int $totalCols;

    private int $startingLine;

    public function __construct(bool $useControlData = false)
    {
        $this->totalCols = $useControlData ? 10 : 34;
        $this->startingLine = $useControlData ? 4 : 9;
        $this->dataFile = $useControlData ?
            new \SplFileObject(__DIR__ . '/../data/day5control.txt') :
            new \SplFileObject(__DIR__ . '/../data/day5.txt');
        $this->dataFile->setFlags(\SplFileObject::SKIP_EMPTY|\SplFileObject::DROP_NEW_LINE);
    }

    public function getStackOrderingMessage(): string
    {
        $warehouse = $this->parseCrates();

        $this->dataFile->seek($this->startingLine);
        $this->dataFile->fgets();
        while (!$this->dataFile->eof()) {
            $line = $this->dataFile->fgets();

            $warehouse = $this->doAction($line, $warehouse);
        }

        return $this->getStackMessage($warehouse);
    }

    public function getStackOrderingMessageCrateMover9001(): string
    {
        $warehouse = $this->parseCrates();

        $this->dataFile->seek($this->startingLine);
        $this->dataFile->fgets();
        while (!$this->dataFile->eof()) {
            $action = $this->dataFile->fgets();

            $warehouse = $this->doAction9001($action, $warehouse);
        }

        return $this->getStackMessage($warehouse);
    }

    private function parseCrates(): array
    {
        $warehouse = [];
        $lines = [];
        while (true) {
            $line = $this->dataFile->fgets();
            if (str_contains($line, '1')) {
                break;
            }
            $lines[] = str_split($line);
        }

        for ($i = 1; $i < $this->totalCols; $i += 4) {
            $warehouse[] = array_values(array_filter(array_column($lines, $i), static fn (string $item) => $item !== ' '));
        }

        return $warehouse;
    }

    private function doAction(string $action, array $warehouse): array
    {
        $matches = [];
        preg_match_all('!\d+!', $action, $matches);
        [$rounds, $from, $to] = $matches[0];

        for ($i = 0; $i < $rounds; $i++) {
            array_unshift($warehouse[$to - 1], array_shift($warehouse[$from - 1]));
        }

        return $warehouse;
    }

    private function doAction9001(string $action, array $warehouse): array
    {
        $matches = [];
        preg_match_all('!\d+!', $action, $matches);
        [$rounds, $from, $to] = array_map(static fn (string $number): int => (int) $number, $matches[0]);

        --$from;
        --$to;
        $itemsToMove = array_slice($warehouse[$from], 0, $rounds);
        for ($i = 0; $i < $rounds; $i++) {
            unset($warehouse[$from][$i]);
        }
        $warehouse[$from] = array_values($warehouse[$from]);
        array_unshift($warehouse[$to], ...$itemsToMove);

        return $warehouse;
    }

    private function getStackMessage(array $warehouse): string
    {
        return implode('', array_map(static fn (array $stack): string => $stack[0], $warehouse));
    }
}
