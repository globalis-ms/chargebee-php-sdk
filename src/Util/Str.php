<?php

namespace Globalis\Chargebee\Util;

class Str
{
    /**
     * @param $value
     *
     * @return string
     */
    public static function studly($value): string
    {
        return str_replace(
            ' ',
            '',
            ucwords(str_replace(['-', '_'], ' ', $value))
        );
    }

    /**
     * @param $value
     *
     * @return string
     */
    public static function removeQueryArgs($url): string
    {
        $url = parse_url($url);

        if (empty($url)) {
            return $url;
        }

        return $url['scheme'] . '://' . $url['host'] . $url['path'];
    }
}
