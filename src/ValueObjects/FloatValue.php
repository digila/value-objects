<?php

namespace Gouter\ValueObjects;

abstract class FloatValue
{
    protected $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function isValid($value): bool
    {
        return is_float($value);
    }

    public function value(): float
    {
        return $this->value;
    }
}
