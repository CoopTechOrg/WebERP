<?php

namespace App\Repositories;

use App\Core\Database\Builer\SaveModelTrait;
use App\Core\Database\Builer\SelectModelTrait;
use App\Models\Buyer;

class BuyerRepository extends Repository
{
    use SelectModelTrait;
    use SaveModelTrait;

    public function modelClass(): string
    {
        return Buyer::class;
    }

}
