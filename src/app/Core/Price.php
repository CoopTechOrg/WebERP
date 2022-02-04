<?php

namespace App\Core;

class Price
{
    /**
     * @var int 価格
     */
    private int $price;

    public function __construct(int $value)
    {
        $this->price = $value;
    }

    /**
     * 価格の取得
     *
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * カンマ区切りの価格
     *
     * @return string
     */
    public function getFormattedPrice(): string
    {
        return number_format($this->price);
    }
}
