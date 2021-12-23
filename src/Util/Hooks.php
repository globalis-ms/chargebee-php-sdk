<?php

namespace Globalis\Chargebee\Util;

class Hooks
{
    public static function doAction($hook_name, ...$arg)
    {
        if(function_exists('do_action')) {
            do_action($hook_name, ...$arg);
        }
    }

    public static function apply_filters($hook_name, $value, ...$arg)
    {
        if(function_exists('apply_filters')) {
            apply_filters($hook_name, $value, ...$arg);
        }
    }
}
