<?php

namespace events;

class Schedule
{

    public function isOccurring(
            Event $e,
            \DateTimeInterface $d) : bool
    {
        //
    }

    public function occurrences(
            Event $e,
            \DateInterval $d) : array
    {
        //
    }

    public function nextOccurrence(
            Event $e,
            \DateTimeInterface $d) : \DateTimeInterface
    {
        //
    }

}
