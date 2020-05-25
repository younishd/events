<?php

declare(strict_types=1);

namespace events\tests;

use PHPUnit\Framework\TestCase;
use events\RangeEveryYear;

class RangeEveryYearTest extends TestCase
{

    public function testPositiveRanges()
    {
        $this->assertTrue((new RangeEveryYear(1))->includes(new \DateTime("2020-01-01")));
        $this->assertTrue((new RangeEveryYear(1, 1))->includes(new \DateTime("2020-01-01")));
        $this->assertTrue((new RangeEveryYear(1, 2))->includes(new \DateTime("2020-01-01")));
        $this->assertTrue((new RangeEveryYear(3, 4))->includes(new \DateTime("2020-03-01")));
        $this->assertTrue((new RangeEveryYear(3, 4))->includes(new \DateTime("2020-04-30")));
        $this->assertTrue((new RangeEveryYear(1, 1, 1))->includes(new \DateTime("2020-01-01")));
        $this->assertTrue((new RangeEveryYear(1, 2, 1))->includes(new \DateTime("2020-01-01")));
        $this->assertTrue((new RangeEveryYear(1, 1, 1, 1))->includes(new \DateTime("2020-01-01")));
        $this->assertTrue((new RangeEveryYear(1, 2, 1, 1))->includes(new \DateTime("2020-01-01")));
        $this->assertFalse((new RangeEveryYear(3, 4))->includes(new \DateTime("2020-02-29")));
        $this->assertFalse((new RangeEveryYear(3, 4))->includes(new \DateTime("2020-05-01")));
    }

    public function testNegativeRanges()
    {
        $this->assertTrue((new RangeEveryYear(11, 3))->includes(new \DateTime("2020-11-01")));
        $this->assertTrue((new RangeEveryYear(11, 3))->includes(new \DateTime("2020-12-01")));
        $this->assertTrue((new RangeEveryYear(11, 3))->includes(new \DateTime("2020-01-31")));
        $this->assertTrue((new RangeEveryYear(11, 3))->includes(new \DateTime("2020-03-31")));
        $this->assertFalse((new RangeEveryYear(11, 3))->includes(new \DateTime("2020-04-01")));
        $this->assertFalse((new RangeEveryYear(11, 3))->includes(new \DateTime("2020-10-31")));
        $this->assertFalse((new RangeEveryYear(11, 3))->includes(new \DateTime("2020-06-01")));
        $this->assertTrue((new RangeEveryYear(11, 3, 15, 26))->includes(new \DateTime("2020-11-15")));
        $this->assertTrue((new RangeEveryYear(11, 3, 15, 26))->includes(new \DateTime("2020-03-26")));
        $this->assertFalse((new RangeEveryYear(11, 3, 15, 26))->includes(new \DateTime("2020-11-14")));
        $this->assertFalse((new RangeEveryYear(11, 3, 15, 26))->includes(new \DateTime("2020-03-27")));
    }

}
