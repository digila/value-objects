<?php

namespace Gouter\ValueObjects\AllowNull;

abstract class FloatValue
{
    protected $value;

    public function __construct(?float $value)
    {
        if (!is_null($value) && !$this->isValid($value)) {
            throw new \InvalidArgumentException("不正な値です。({$value})");
        }

        $this->value = $value;
    }

    public function isValid($value): bool
    {
        return is_float($value);
    }

    public function value(): ?float
    {
        return $this->value;
    }
}
