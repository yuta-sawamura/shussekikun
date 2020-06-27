<?php

namespace App\Enums\User;

use BenSampo\Enum\Enum;

final class Status extends Enum
{
    const Continue = 1;
    const Cancel = 2;

    public static function getDescription($value): string
    {
        foreach(Status::getValues() as $v) {
            if ($value === $v) {
                return __('enum.user.status.' . strtolower(Status::getKey($v)));
            }
        }
        return self::getKey($value);
    }
}
