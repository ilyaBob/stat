<?php

namespace App\Models\Enum;

enum ProductEnum
{
    const KILOGRAM = 'кг';
    const LITER = 'л';
    const PIECES = 'шт';

    public static function getListUnits(): array
    {
        return [
            self::KILOGRAM,
            self::LITER,
            self::PIECES,
        ];
    }
}
