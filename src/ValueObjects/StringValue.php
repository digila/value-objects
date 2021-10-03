<?php

namespace Gouter\ValueObjects;

abstract class StringValue
{
    protected $value;

    public function __construct(string $value)
    {
        $this->value = trim($value);
    }

    public function isValid($value): bool
    {
        return true;
    }

    public function value(): string
    {
        return $this->value;
    }
}
