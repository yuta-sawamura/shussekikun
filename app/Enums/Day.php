<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Day extends Enum
{
    const Sun = 1;
    const Mon = 2;
    const Tue = 3;
    const Wed = 4;
    const Thu = 5;
    const Fri = 6;
    const Sat = 7;

    public static function getDescription($value): string
    {
        foreach(Day::getValues() as $v) {
            if ($value === $v) {
                return __('enum.day.' . strtolower(Day::getKey($v)));
            }
        }
        return self::getKey($value);
    }
}
