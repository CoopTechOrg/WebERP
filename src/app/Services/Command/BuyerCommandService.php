<?php

namespace App\Services\Command;

use App\Models\Buyer;
use App\Repositories\BuyerRepository;
use App\Services\Command\Entity\BuyerEntity;

class BuyerCommandService
{
    private BuyerRepository $buyerRepository;

    public function __construct(BuyerRepository $buyerRepository)
    {
        $this->buyerRepository = $buyerRepository;
    }

    public function create(string $name, string $unit, ?string $remarks): Buyer
    {
        $buyerEntity = new BuyerEntity($name, $unit, $remarks);

        /**
         * @var Buyer $buyer
         */
        $buyer = $this->buyerRepository->save($buyerEntity->getModel());
        return $buyer;
    }
}
