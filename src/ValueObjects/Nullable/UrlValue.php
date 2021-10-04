<?php

namespace Digila\ValueObjects\Nullable;

abstract class UrlValue
{
    protected $value;

    public function __construct(?string $value = null)
    {
        $value = trim($value);
        $value = $value != "" ? $value : null;

        if (!empty($value) && !self::isValid($value)) {
            throw new \InvalidArgumentException("URLの形式ではありません。({$value})");
        }

        $this->value = !empty($value) ? $value : null;
    }

    public static function isValid($value): bool
    {
        return preg_match('/https?:\/{2}[\w\/:%#\$&\?\(\)~\.=\+\-]+/', $value);
    }

    public function value(): ?string
    {
        return $this->value;
    }
    
    public function scheme(): ?string
    {
        return parse_url($this->value, PHP_URL_SCHEME);
    }

    public function domain(): ?string
    {
        return parse_url($this->value, PHP_URL_HOST);
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
