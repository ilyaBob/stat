<?php

namespace App\Trait;

trait EnumDefault
{
    public static function toArray(): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            $array[$case->value] = self::getList()[$case->value];
        }
        return $array;
    }

    public static function toString(int $int): string
    {
        return self::getList()[$int];
    }

    public function valueText(): string
    {
        return self::getList()[$this->value];
    }
}
