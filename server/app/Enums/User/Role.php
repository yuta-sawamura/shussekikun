<?php

namespace App\Enums\User;

use BenSampo\Enum\Enum;

final class Role extends Enum
{
    const System = 1;
    const Organization_admin = 3;
    const Store_share = 5;
    const Normal = 9;

    public static function getListByOrganizationAdmin(): array
    {
        return [
            self::Organization_admin => __('enum.user.role.' . 'organization_admin'),
            self::Store_share => __('enum.user.role.' . 'store_share'),
            self::Normal => __('enum.user.role.' . 'normal')
        ];
    }

    public static function getDescription($value): string
    {
        foreach(Role::getValues() as $v) {
            if ($value === $v) {
                return __('enum.user.role.' . strtolower(Role::getKey($v)));
            }
        }
        return self::getKey($value);
    }
}
