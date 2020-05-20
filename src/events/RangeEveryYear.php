<?php

declare(strict_types=1);

namespace events;

class RangeEveryYear implements TimeExpr
{

    private $start_month;

    private $end_month;

    private $start_day;

    private $end_day;

    public function __construct(
            int $start_month,
            int $end_month = null,
            int $start_day = null,
            int $end_day = null)
    {
        $this->start_month = $start_month;
        $this->end_month = $end_month ?? $start_month;
        $this->start_day = $start_day ?? 1;
        $this->end_day = $end_day ?? 31;

        if ($this->start_month < 1 || $this->start_month > 12)
                throw new \InvalidArgumentException("start_month: $start_month");
        if ($this->end_month < 1 || $this->end_month > 12)
                throw new \InvalidArgumentException("end_month: $end_month");
        if ($this->start_day < 1 || $this->start_day > 31)
                throw new \InvalidArgumentException("start_day: $start_day");
        if ($this->end_day < 1 || $this->end_day > 31)
                throw new \InvalidArgumentException("end_day: $end_day");
    }

    public function includes(\DateTimeInterface $d) : bool
    {
        $month = (int) $d->format('n');
        $day = (int) $d->format('j');

        return ($this->start_month << 5) + $this->start_day <= ($month << 5) + $day
                && ($month << 5) + $day <= ($this->end_month << 5) + $this->end_day;
    }

}
