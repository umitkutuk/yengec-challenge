<?php

namespace App\Rules;

class SushiRules
{
    public static function exists($calledClass, $column)
    {
        return new SushiExists($calledClass, $column);
    }
}
