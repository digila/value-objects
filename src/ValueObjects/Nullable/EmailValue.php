<?php

namespace Digila\ValueObjects\Nullable;

abstract class EmailValue
{
    protected $value;

    public function __construct(?string $value = null)
    {
        $value = trim($value);
        $value = $value != "" ? $value : null;

        if (!empty($value) && !self::isValid($value)) {
            throw new \InvalidArgumentException("メールアドレスの形式ではありません。({$value})");
        }

        $this->value = $value;
    }

    public static function isValid($value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function value(): ?string
    {
        return $this->value;
    }

    public function isNull(): bool
    {
        return is_null($this->value);
    }

    public function has(): bool
    {
        return !empty($this->value) ? true : false;
    }
}
