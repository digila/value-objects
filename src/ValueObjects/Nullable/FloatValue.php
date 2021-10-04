<?php

namespace Digila\ValueObjects\Nullable;

abstract class FloatValue
{
    protected $value;

    public function __construct(?float $value = null)
    {
        if (!is_null($value) && !self::isValid($value)) {
            throw new \InvalidArgumentException("不正な値です。({$value})");
        }

        $this->value = $value;
    }

    public static function isValid($value): bool
    {
        return is_float($value);
    }

    public function value(): ?float
    {
        return $this->value;
    }

    public function isNull(): bool
    {
        return is_null($this->value);
    }

    public function has(): bool
    {
        return $this->value !== null ? true : false;
    }
}
