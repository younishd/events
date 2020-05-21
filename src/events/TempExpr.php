<?php

declare(strict_types=1);

namespace events;

interface TempExpr
{

    public function includes(\DateTimeInterface $d) : bool;

}
