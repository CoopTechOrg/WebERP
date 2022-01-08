<?php

namespace App\ValueObjects;

use App\Exceptions\BusinessLogicException;

trait ValueObject
{
    private $value;

    private function __construct($value, bool $nullable = false)
    {
        if ($nullable && $value === null) {
            return;
        }

        $value = static::transform($value);
        // if (!static::validate($value)) {
        //     throw new BusinessLogicException(static::errorMessage($value));
        // }
        $this->value = $value;
    }

    /**
     * 値を変換する
     * @param $value
     * @return mixed
     */
    public static function transform($value)
    {
        return $value;
    }

    /**
     * 値を検証する
     * @param $value
     * @return bool
     */
    abstract public static function validate($value): bool;

    /**
     * エラーメッセージを作成する
     * @param $value
     * @return string
     */
    public static function errorMessage($value): string
    {
        return $value . ' is invalid ' . static::class;
    }

    /**
     * 値が一致するか比較する
     * @param $value
     * @return bool
     */
    public function is($value): bool
    {
        if ($value === null) {
            return $this->value === null;
        }

        return $this->value === (static::of($value)->value());
    }

    /**
     * 値を取得する
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * 値オブジェクトを生成する
     * @param $value
     * @param bool $nullable
     * @return \App\Core\Domain\ValueObject
     */
    public static function of($value, bool $nullable = false): self
    {
        if ($value instanceof self) {
            return $value;
        }

        return new static($value, $nullable);
    }
}
