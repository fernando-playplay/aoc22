<?php

namespace App\Common;

final class Quicksort
{
    public function __invoke(array $array): array
    {
        $loe = $gt = [];
        if (count($array) < 2) {
            return $array;
        }

        $pivot_key = key($array);
        $pivot = array_shift($array);
        foreach ($array as $val) {
            if ($val <= $pivot) {
                $loe[] = $val;
            } else {
                $gt[] = $val;
            }
        }

        return [
            ...(new Quicksort())($gt),
            ...[$pivot_key => $pivot],
            ...(new Quicksort())($loe),
        ];
    }
}
