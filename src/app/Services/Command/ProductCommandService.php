<?php

namespace App\Services\Command;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\Command\Entity\ProductEntity;

class ProductCommandService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create(string $name, string $unit, ?string $remarks): Product
    {
        $productEntity = new ProductEntity($name, $unit, $remarks);

        /**
         * @var Product $product
         */
        $product = $this->productRepository->save($productEntity->getModel());
        return $product;
    }
}
