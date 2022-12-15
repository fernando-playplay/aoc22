<?php

declare(strict_types=1);

namespace App\day6;

final class TuningTrouble
{
    public function getMarkerPosition(int $desiredLength, string $buffer): int
    {
        $bufferArr = str_split($buffer);
        $length = count($bufferArr);
        $tmp = array_slice($bufferArr, 0, $desiredLength);

        if (count(array_unique($tmp)) === $desiredLength) {
            return $desiredLength;
        }

        for ($i = $desiredLength; $i < $length; $i++) {
            $tmp[] = $bufferArr[$i];
            array_shift($tmp);

            if (count(array_unique($tmp)) === $desiredLength) {
                return $i+1;
            }
        }

        return 0;
    }
}
