<?php

namespace App\Services\Command\Entity;

use App\Models\Buyer;
use App\Enum\ProgramLogicType;
use App\Exceptions\ORMNotFoundException;
use App\Exceptions\ProgramLogicException;
use App\Repositories\BuyerRepository;

class BuyerEntity extends Entity
{

    private ?string $email;

    private ?string $tel;

    private string $contactPersonFamilyName;

    private string $contactPersonGivenName;

    private int $prefectureId;

    private string $postalCode;

    private string $city;

    private string $town;

    private string $building;

    private ?string $remarks;

    private ?Buyer $buyer;

    private BuyerRepository $buyerRepository;

    public function __construct()
    {
        $this->buyerRepository = app(BuyerRepository::class);
    }

    public function getModel(): Buyer
    {
        return $this->buyer;
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
        $this->buyer = $this->id === null ? new Buyer() : $this->buyerRepository->select($this->id);
        if($this->buyer === null) {
            throw new ORMNotFoundException();
        }
    }
}
