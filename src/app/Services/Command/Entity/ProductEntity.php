<?php

namespace App\Services\Command\Entity;

use App\Models\Product;

class ProductEntity extends Entity
{

    private string $name;

    private string $unit;

    private ?string $remarks;

    public function __construct(string $name, string $unit, ?string $remarks)
    {
        $this->name = $name;
        $this->unit = $unit;
        $this->remarks = $remarks;
    }

    public function getModel(): Product
    {
        $product = new Product();
        $product->name = $this->name;
        $product->unit = $this->unit;
        $product->remarks = $this->remarks;
        return $product;
    }
}
