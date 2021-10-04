<?php

namespace Digila\ValueObjects\Nullable;

abstract class GeometryValue
{
    protected $latitude;
    protected $longitude;

    public function __construct(?float $latitude = null, ?float $longitude = null)
    {
        if (!is_null($latitude) && !is_null($longitude) && !self::isValid($latitude, $longitude)) {
            throw new \InvalidArgumentException("不正な値です。(latitude:{$latitude} | longitude:{$longitude})");
        }

        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public static function isValid($latitude, $longitude): bool
    {
        if (
            preg_match('/^[-]?((([0-8]?[0-9])(\.[0-9]{3,}))|90(\.0{3,})?)$/', $latitude) &&
            preg_match('/^[-]?(((([1][0-7][0-9])|([0-9]?[0-9]))(\.[0-9]{3,}))|180(\.0{3,})?)$/', $longitude)
        ) {
            return true;
        }

        return false;
    }

    public function latitude(): ?float
    {
        return $this->latitude;
    }

    public function longitude(): ?float
    {
        return $this->longitude;
    }

    public function isNull(): bool
    {
        return is_null($this->latitude) || is_null($this->longitude) ? true : false;
    }

    public function has(): bool
    {
        return !is_null($this->latitude) && !is_null($this->longitude) ? true : false;
    }
}
