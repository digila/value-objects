<?php

namespace Gouter\ValueObjects;

abstract class IntegerValue
{
    protected $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function isValid($value): bool
    {
        return is_int($value);
    }

    public function value(): int
    {
        return $this->value;
    }
}
