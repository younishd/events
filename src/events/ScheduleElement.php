<?php

declare(strict_types=1);

namespace events;

class ScheduleElement
{

    private $event;

    private $temp_expr;

    public function __construct(
            Event $e,
            TempExpr $t)
    {
        $this->event = $e;
        $this->temp_expr = $t;
    }

    public function isOccurring(
            Event $e,
            \DateTimeInterface $d) : bool
    {
        return $this->event == $e && $this->temp_expr->includes($d);
    }

}
