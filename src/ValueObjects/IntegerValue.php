<?php

namespace Digila\ValueObjects;

abstract class IntegerValue
{
    protected $value;

    public function __construct(int $value)
    {
        if (is_null($value) || !self::isValid($value)) {
            throw new \InvalidArgumentException("不正な値です。({$value})");
        }

        $this->value = $value;
    }

    public static function isValid($value): bool
    {
        return is_int($value);
    }

    public function value(): int
    {
        return $this->value;
    }

    public function isNull(): bool
    {
        return false;
    }

    public function has(): bool
    {
        return true;
    }
}
