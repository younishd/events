<?php

declare(strict_types=1);

namespace events;

class Union implements TemporalExpression
{
    private $expressions;

    public function __construct(TemporalExpression ...$t)
    {
        $this->expressions = $t;
    }

    public function includes(\DateTimeInterface $d): bool
    {
        foreach ($this->expressions as $t) {
            if ($t->includes($d)) {
                return true;
            }
        }
        return false;
    }

}
