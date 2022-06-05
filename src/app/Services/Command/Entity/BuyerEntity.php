<?php

namespace App\Services\Command\Entity;

use App\Models\Buyer;
use App\Enum\ProgramLogicType;
use App\Exceptions\ProgramLogicException;

class BuyerEntity implements IEntity
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

    public function __construct(array $params)
    {
        foreach ($params as $propName => $propValue) {
            if (property_exists(self::class, $propName) === false) {
                throw new ProgramLogicException(ProgramLogicType::propType());
            }
            $this->$propName = $propValue;
        }
    }

    public function getModel(): Buyer
    {
        $buyer = new Buyer();
        // $product->name = $this->name;
        // $product->unit = $this->unit;
        // $product->remarks = $this->remarks;
        return $buyer;
    }
}
