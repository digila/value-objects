<?php

namespace Gouter\ValueObjects;

use Carbon\CarbonImmutable as Carbon;

abstract class DateTimeValue
{
    protected $value;

    public function __construct(Carbon $value)
    {
        $this->value = $value;
    }

    public function isValid($value): bool
    {
        return true;
    }

    public function value(): Carbon
    {
        return $this->value;
    }

    public function format(string $format): string
    {
        return $this->value->format($format);
    }

    /**
     * $this->valueが過去かどうか。
     * 第1引数にtrueを指定すると、日付(年月日)のみで判断する。
     * (※時間を23:59:59にセットするので、当日中は返り値はfalseとなる).
     *
     * @param ?bool $byDate
     */
    public function isPast(?bool $byDate = false): bool
    {
        $value = $this->value();

        if ($byDate) {
            $value = $this->value->setTimeFromTimeString('23:59:59');
        }

        return $value->isPast();
    }

    public function gt(Carbon $date): bool
    {
        return $this->value->gt($date);
    }

    public function lt(Carbon $date): bool
    {
        return $this->value->lt($date);
    }
}
