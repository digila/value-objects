<?php

namespace Digila\ValueObjects;

abstract class UrlValue
{
    protected $value;

    public function __construct(string $value)
    {
        $value = trim($value);
        $value = $value != "" ? $value : null;

        if (!self::isValid($value)) {
            throw new \InvalidArgumentException("URLの形式ではありません。({$value})");
        }

        $this->value = $value;
    }

    public static function isValid($value): bool
    {
        return preg_match('/https?:\/{2}[\w\/:%#\$&\?\(\)~\.=\+\-]+/', $value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function scheme(): string
    {
        return parse_url($this->value, PHP_URL_SCHEME);
    }

    public function domain(): string
    {
        return parse_url($this->value, PHP_URL_HOST);
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
