<?php

namespace NathanDunn\Chargebee\Util;

class Str
{
    /**
     * @param $value
     * @return string
     */
    public static function studly($value): string
    {
        return str_replace(' ', '',
            ucwords(str_replace(['-', '_'], ' ', $value))
        );
    }
}