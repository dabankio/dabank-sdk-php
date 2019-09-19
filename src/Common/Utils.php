<?php

namespace Bigbang\Common;

class Utils
{

    public static function tryGetValue(array $array = null, $key, $default = null)
    {
        return is_array($array) && array_key_exists($key, $array)
            ? $array[$key]
            : $default;
    }
}
