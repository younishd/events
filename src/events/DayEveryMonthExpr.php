<?php

namespace events;

class DayEveryMonthExpr implements TimeExpr
{

    private $weekday;

    private $count;

    public function __construct(
            int $weekday,
            int $count)
    {
        $this->weekday = $weekday;
        $this->count = $count;
    }

    public function includes(\DateTimeInterface $d) : bool
    {
        return $this->weekday === (int) $d->format('w')
                && abs($this->count) === 1 + intdiv($this->count > 0
                ? (int) $d->format('j') - 1
                : (int) $d->format('t') - (int) $d->format('j'), 7);
    }

}
