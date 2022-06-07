<?php

namespace App\Enum;

abstract class ProgramLogicType
{
    public static function logicType() :self
    {
        return new self();
    }
}