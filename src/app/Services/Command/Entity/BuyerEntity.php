<?php

namespace App\Services\Command\Entity;

use App\Models\Buyer;
use App\Enum\ProgramLogicType;
use App\Exceptions\ORMNotFoundException;
use App\Exceptions\ProgramLogicException;
use App\Repositories\BuyerRepository;

class BuyerEntity extends Entity
{
    private ?Buyer $buyer;

    private BuyerRepository $buyerRepository;

    public function __construct()
    {
        $this->buyerRepository = app(BuyerRepository::class);
    }

    /**
     * modelを取得する
     *
     * @return Buyer
     */
    public function getModel(): Buyer
    {
        return $this->buyer;
    }

    /**
     * インスタンスを取得する
     *
     * @param integer|null $id
     * @return self
     */
    public static function getInstance(?int $id = null): self
    {
        $entity = new self();
        $entity->id = $id;

        $entity->getDefaultModel();

        return $entity;
    }

    /**
     * 新しいインスタンスを作成する
     *
     * @return self
     */
    public static function new(): self
    {
        return self::getInstance();
    }

    /**
     * 同idのインスタンスを取得する
     *
     * @param integer $id
     * @return self
     */
    public static function find(int $id): self
    {
        return self::getInstance($id);
    }

    /**
     * 名前を設定する
     *
     * @param string $familyName
     * @param string $givenName
     * @return self
     */
    public function setNames(string $familyName, string $givenName): self
    {
        $this->buyer->contact_person_family_name = $familyName;
        $this->buyer->contact_person_given_name = $givenName;
        return $this;
    }

    /**
     * 連絡先を設定する
     *
     * @param string|null $email
     * @param string|null $tel
     * @return self
     */
    public function setContact(?string $email, ?string $tel): self
    {
        $this->buyer->email = $email;
        $this->buyer->tel = $tel;
        return $this;
    }

    /**
     * 住所を設定する
     *
     * @param integer $prefectureId
     * @param string $postalCode
     * @param string $city
     * @param string $town
     * @param string $building
     * @return self
     */
    public function setAddress(int $prefectureId, string $postalCode, string $city, string $town, string $building): self
    {
        $this->buyer->prefecture_id = $prefectureId;
        $this->buyer->postal_code = $postalCode;
        $this->buyer->city = $city;
        $this->buyer->town = $town;
        $this->buyer->building = $building;

        return $this;
    }

    /**
     * 備考を設定する
     *
     * @param string|null $remarks
     * @return self
     */
    public function setRemarks(?string $remarks): self
    {
        $this->buyer->remarks = $remarks;
        return $this;
    }

    /**
     * modelを取得する
     *
     * @return void
     */
    protected function getDefaultModel(): void
    {
        $this->buyer = $this->id === null ? new Buyer() : $this->buyerRepository->select($this->id);
        if ($this->buyer === null) {
            throw new ORMNotFoundException();
        }
    }
}
