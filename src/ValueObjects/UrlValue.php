<?php

namespace Gouter\ValueObjects;

abstract class UrlValue
{
    protected $value;

    public function __construct(string $value)
    {
        $value = trim($value);

        if (!is_null($value) && !$this->isValid($value)) {
            throw new \InvalidArgumentException("URLの形式ではありません。({$value})");
        }

        $this->value = $value;
    }

    public function isValid($value): bool
    {
        return preg_match('/https?:\/{2}[\w\/:%#\$&\?\(\)~\.=\+\-]+/', $value);
    }

    public function value(): string
    {
        return $this->value;
    }
}
