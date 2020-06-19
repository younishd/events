<?php

declare(strict_types=1);

namespace events;

class ScheduleElement
{

    private $event;

    private $expression;

    public function __construct(
            Event $e,
            TemporalExpression $t)
    {
        $this->event = $e;
        $this->expression = $t;
    }

    public function isOccurring(
            Event $e,
            \DateTimeInterface $d): bool
    {
        return $this->event == $e && $this->expression->includes($d);
    }

    public function getEvent(): Event
    {
        //
    }

    public function setEvent(Event $e)
    {
        //
    }

    public function getTemporalExpression(): TemporalExpression
    {
        //
    }

    public function setTemporalExpression(TemporalExpression $t)
    {
        //
    }

}
