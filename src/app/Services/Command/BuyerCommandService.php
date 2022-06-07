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

    /**
     * 販売者情報を新規作成する
     *
     * @param string|null $email
     * @param string|null $tel
     * @param string $contactPersonFamilyName
     * @param string $contactPersonGivenName
     * @param integer $prefectureId
     * @param string $postalCode
     * @param string $city
     * @param string $town
     * @param string $building
     * @param string|null $remarks
     * @return Buyer
     */
    public function create(
        ?string $email,
        ?string $tel,
        string $contactPersonFamilyName,
        string $contactPersonGivenName,
        int $prefectureId,
        string $postalCode,
        string $city,
        string $town,
        string $building,
        ?string $remarks
    ): Buyer {
        $buyerEntity = BuyerEntity::new()
            ->setContact($email, $tel)
            ->setNames($contactPersonFamilyName, $contactPersonGivenName)
            ->setAddress($prefectureId, $postalCode, $city, $town, $building)
            ->setRemarks($remarks);

        /**
         * @var Buyer $buyer
         */
        $buyer = $this->buyerRepository->save($buyerEntity->getModel());
        return $buyer;
    }
}
