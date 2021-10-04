<?php

namespace Digila\ValueObjects;

abstract class BooleanValue
{
    protected $value;

    public function __construct(bool $value)
    {
        if (is_null($value) || !self::isValid($value)) {
            throw new \InvalidArgumentException("不正な値です。({$value})");
        }

        $this->value = $value;
    }

    public static function isValid($value): bool
    {
        return is_bool($value);
    }

    public function is(): bool
    {
        return $this->value;
    }

    public function not(): bool
    {
        return !$this->value;
    }

    public function value(): bool
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
