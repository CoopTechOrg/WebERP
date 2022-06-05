<?php

namespace App\Exceptions;

use App\Enum\ProgramLogicType;
use Exception;

class ProgramLogicException extends Exception
{
    //
    private ProgramLogicType $type;

    public function __construct(ProgramLogicType $type)
    {
        $this->type = $type;
    }

}
