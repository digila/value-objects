<?php

namespace Digila\ValueObjects;

abstract class EmailValue
{
    protected $value;

    public function __construct(string $value)
    {
        $value = trim($value);
        $value = $value != "" ? $value : null;

        if (is_null($value) || !self::isValid($value)) {
            throw new \InvalidArgumentException("メールアドレスの形式ではありません。({$value})");
        }

        $this->value = $value;
    }

    public static function isValid($value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
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
