<?php

declare(strict_types=1);

namespace events;

class DayEveryMonth implements TemporalExpression
{

    private $weekday;

    private $count;

    public function __construct(
            int $weekday,
            int $count
    ) {
        if ($weekday < 0 || $weekday > 6) {
            throw new \InvalidArgumentException(sprintf('weekday: "%s"', $weekday));
        }

        if ($count < -5 || $count > 5) {
            throw new \InvalidArgumentException(sprintf('count: "%s"', $count));
        }

        $this->weekday = $weekday;
        $this->count = $count;
    }

    public function includes(\DateTimeInterface $d): bool
    {
        $weekday = (int) $d->format('w');
        $day = (int) $d->format('j');
        $days_in_month = (int) $d->format('t');

        return $this->weekday === $weekday
                && abs($this->count) ===
                1 + intdiv($this->count > 0 ? $day - 1 : $days_in_month - $day, 7);
    }

}
