<?php

namespace App\Services\Command\Entity;

use Illuminate\Database\Eloquent\Model;

abstract class Entity implements IEntity
{
    protected ?int $id = null;

    abstract public static function new(): self;
    abstract public static function find(int $id): self;
    abstract protected function getDefaultModel(): void;

}
