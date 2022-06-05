<?php

namespace App\Enum;

abstract class ProgramLogicType
{
    public static function propType() :self
    {
        return new self();
    }
}