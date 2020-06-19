<?php

declare(strict_types=1);

namespace events;

interface TemporalExpression
{

    public function includes(\DateTimeInterface $d): bool;

}
