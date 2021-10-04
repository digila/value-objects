<?php

namespace Digila\ValueObjects\Nullable;

abstract class NameValue
{
    protected $lastName;
    protected $firstName;
    protected $lastRubi;
    protected $firstRubi;

    public function __construct(
        ?string $lastName = null,
        ?string $firstName = null,
        ?string $lastRubi = null,
        ?string $firstRubi = null
    )
    {
        if (!self::isValid($lastName, $firstName)) {
            throw new \InvalidArgumentException("不正な値です。(lastName:{$lastName} | firstName:{$firstName})");
        }

        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->lastRubi = $lastRubi;
        $this->firstRubi = $firstRubi;
    }

    public static function isValid($lastName, $firstName): bool
    {
        if ((!is_null($lastName) && !is_string($lastName)) || (!is_null($firstName) && !is_string($firstName))) {
            return false;
        }

        return true;
    }

    public function value(?bool $isZenkakuSpace = false): ?string
    {
        $space = null;

        if (!empty($this->lastName)) {
            $space = $isZenkakuSpace ? '　' : ' ';
        }

        return $this->lastName . $space . $this->firstName;
    }

    public function rubi(?bool $isZenkakuSpace = false): ?string
    {
        $space = null;

        if (!empty($this->lastRubi)) {
            $space = $isZenkakuSpace ? '　' : ' ';
        }

        return $this->lastRubi . $space . $this->firstRubi;
    }

    public function lastName(): ?string
    {
        return $this->lastName;
    }

    public function firstName(): ?string
    {
        return $this->firstName;
    }

    public function lastRubi(): ?string
    {
        return $this->lastRubi;
    }

    public function firstRubi(): ?string
    {
        return $this->firstRubi;
    }

    public function isNull(): bool
    {
        return is_null($this->lastName) && is_null($this->firstName) ? true : false;
    }

    public function has(): bool
    {
        return !is_null($this->lastName) || !is_null($this->firstName) ? true : false;
    }

    public function hasName(): bool
    {
        return !is_null($this->lastName) && !is_null($this->firstName) ? true : false;
    }

    public function hasRubi(): bool
    {
        return !is_null($this->lastRubi) && !is_null($this->firstRubi) ? true : false;
    }
}
