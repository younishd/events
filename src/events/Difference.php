<?php

declare(strict_types=1);

namespace events;

class Difference implements TemporalExpression
{

    private $included;

    private $excluded;

    public function __construct(
        TemporalExpression $included,
        TemporalExpression $excluded
    ) {
        $this->included = $included;
        $this->excluded = $excluded;
    }

    public function includes(\DateTimeInterface $d): bool
    {
        return $this->included->includes($d) && !$this->excluded->includes($d);
    }

}
