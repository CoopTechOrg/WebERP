<?php

namespace App\Services\Command\Entity;

use Illuminate\Database\Eloquent\Model;

interface IEntity
{
    public function getModel(): Model;
}
