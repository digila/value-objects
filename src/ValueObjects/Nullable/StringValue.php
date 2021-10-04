<?php

namespace Digila\ValueObjects\Nullable;

abstract class StringValue
{
    protected $value;

    public function __construct(?string $value = null)
    {
        $value = trim($value);
        $value = $value != "" ? $value : null;

        $this->value = $value;
    }

    public static function isValid($value): bool
    {
        return true;
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
