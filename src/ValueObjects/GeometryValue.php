<?php

namespace Digila\ValueObjects;

abstract class GeometryValue
{
    protected $latitude;
    protected $longitude;

    public function __construct(float $latitude, float $longitude)
    {
        if (is_null($latitude) || is_null($longitude) || !self::isValid($latitude, $longitude)) {
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

    public function latitude(): float
    {
        return $this->latitude;
    }

    public function longitude(): float
    {
        return $this->longitude;
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
