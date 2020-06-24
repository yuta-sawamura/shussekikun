<?php

namespace App\Enums\User;

use BenSampo\Enum\Enum;

final class Gender extends Enum
{
    const Man = 1;
    const Woman = 2;

    public static function getDescription($value): string
    {
        foreach(Gender::getValues() as $v) {
            if ($value === $v) {
                return __('enum.user.gender.' . strtolower(Gender::getKey($v)));
            }
        }
        return self::getKey($value);
    }
}
