<?php

namespace App\Models\Enum;

use App\Trait\EnumDefault;

enum DeliveryStatusEnum: int
{
    use EnumDefault;
    case OPEN = 1;
    case CLOSE = 2;

    public static function getList(): array
    {
        return [
            self::OPEN->value => 'Открыта',
            self::CLOSE->value => 'Закрыта ',
        ];
    }
}
