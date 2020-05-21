<?php

declare(strict_types=1);

namespace events\tests;

use PHPUnit\Framework\TestCase;
use events\RangeEveryYearExpr;

class RangeEveryYearExprTest extends TestCase
{

    public function testSimpleRanges()
    {
        $this->assertTrue((new RangeEveryYearExpr(1))->includes(new \DateTime("2020-01-01")));
        $this->assertTrue((new RangeEveryYearExpr(1, 1))->includes(new \DateTime("2020-01-01")));
        $this->assertTrue((new RangeEveryYearExpr(1, 2))->includes(new \DateTime("2020-01-01")));
        $this->assertTrue((new RangeEveryYearExpr(1, 1, 1))->includes(new \DateTime("2020-01-01")));
        $this->assertTrue((new RangeEveryYearExpr(1, 2, 1))->includes(new \DateTime("2020-01-01")));
        $this->assertTrue((new RangeEveryYearExpr(1, 1, 1, 1))->includes(new \DateTime("2020-01-01")));
        $this->assertTrue((new RangeEveryYearExpr(1, 2, 1, 1))->includes(new \DateTime("2020-01-01")));
    }

}
