<?php

namespace Gouter\ValueObjects;

abstract class UuidValue
{
    protected $value;

    public function __construct(string $value)
    {
        $value = trim($value);

        if (!$this->isValid($value)) {
            throw new \InvalidArgumentException("UUIDの形式ではありません。({$value})");
        }

        $this->value = $value;
    }

    public function isValid($value): bool
    {
        return preg_match('/^[\da-f]{8}-[\da-f]{4}-[\da-f]{4}-[\da-f]{4}-[\da-f]{12}$/iD', $value) ? true : false;
    }

    public function value(): string
    {
        return $this->value;
    }
}
