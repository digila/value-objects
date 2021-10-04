<?php

namespace Digila\ValueObjects;

abstract class UuidValue
{
    protected $value;

    public function __construct(string $value)
    {
        $value = trim($value);
        $value = $value != "" ? $value : null;

        if (!self::isValid($value)) {
            throw new \InvalidArgumentException("UUIDの形式ではありません。({$value})");
        }

        $this->value = $value;
    }

    public static function isValid($value): bool
    {
        return preg_match('/^[\da-f]{8}-[\da-f]{4}-[\da-f]{4}-[\da-f]{4}-[\da-f]{12}$/iD', $value) ? true : false;
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
