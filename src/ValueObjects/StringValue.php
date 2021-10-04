<?php

namespace Digila\ValueObjects;

abstract class StringValue
{
    protected $value;

    public function __construct(string $value)
    {
        $value = trim($value);
        $value = $value != "" ? $value : null;

        if (!self::isValid($value)) {
            throw new \InvalidArgumentException("nullまたは空文字は許可されていません。({$value})");
        }

        $this->value = $value;
    }

    public static function isValid($value): bool
    {
        if (is_null($value) || '' === $value) {
            return false;
        }

        return true;
    }

    public function value(): string
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
