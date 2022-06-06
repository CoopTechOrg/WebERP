<?php

namespace App\Services\Command\Entity;

use App\Models\Product;
use App\Enum\ProgramLogicType;
use App\Exceptions\ORMNotFoundException;
use App\Exceptions\ProgramLogicException;
use App\Repositories\ProductRepository;

class ProductEntity extends Entity
{

    private ?Product $product;

    private ProductRepository $productRepository;

    public function __construct()
    {
        $this->productRepository = app(ProductRepository::class);

    }

    public function getModel(): Product
    {
        return $this->product;
    }

    public static function getInstance(?int $id = null): self
    {
        $entity = new self();
        $entity->id = $id;

        $entity->getDefaultModel();

        return $entity;
    }

    public static function new(): self
    {
        return self::getInstance();
    }

    public static function find(int $id): self
    {
        return self::getInstance($id);
    }

    protected function getDefaultModel(): void
    {
        $this->product = $this->id === null ? new Product() : $this->productRepository->select($this->id);
        if($this->product === null) {
            throw new ORMNotFoundException();
        }
    }

}
