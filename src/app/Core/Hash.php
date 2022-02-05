<?php

namespace App\Core;

use Illuminate\Support\Facades\Hash as FacadesHash;

class Hash extends FacadesHash
{
    public static function makeToUrl(string $value):string
    {
        return str_replace('/', '', parent::make($value));
    }
}
