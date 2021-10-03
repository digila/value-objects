<?php

namespace Gouter\ValueObjects;

abstract class BooleanValue
{
    protected $value;

    public function __construct(bool $value)
    {
        $this->value = $value;
    }

    public function isValid($value): bool
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
}
