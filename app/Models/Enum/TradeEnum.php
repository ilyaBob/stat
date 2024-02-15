<?php

namespace App\Models\Enum;

enum TradeEnum
{
    const STATUS_START = 1;
    const STATUS_FINAL = 2;

    public static function getListStatuses(): array
    {
        return [
            self::STATUS_START => 'В процессе',
            self::STATUS_FINAL => 'Окончен',
        ];
    }
}
