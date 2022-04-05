<?php

namespace App\Repositories;

use App\Core\Database\Builer\SaveModelTrait;
use App\Core\Database\Builer\SelectModelTrait;
use App\Models\Product;

class ProductRepository extends Repository
{
    use SelectModelTrait;
    use SaveModelTrait;

    public function modelClass(): string
    {
        return Product::class;
    }

}
