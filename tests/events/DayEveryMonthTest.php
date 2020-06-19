<?php

declare(strict_types=1);

namespace events\tests;

use PHPUnit\Framework\TestCase;
use events\DayEveryMonth;

class DayEveryMonthTest extends TestCase
{

    public function testPositiveCounts()
    {
        $this->assertTrue((new DayEveryMonth(1, 1))->includes(new \DateTime("2020-06-01")));
        $this->assertTrue((new DayEveryMonth(1, 2))->includes(new \DateTime("2020-06-08")));
        $this->assertTrue((new DayEveryMonth(1, 3))->includes(new \DateTime("2020-06-15")));
        $this->assertTrue((new DayEveryMonth(1, 4))->includes(new \DateTime("2020-06-22")));
        $this->assertTrue((new DayEveryMonth(1, 5))->includes(new \DateTime("2020-06-29")));

        $this->assertFalse((new DayEveryMonth(1, 1))->includes(new \DateTime("2020-06-02")));
        $this->assertFalse((new DayEveryMonth(1, 2))->includes(new \DateTime("2020-06-07")));
        $this->assertFalse((new DayEveryMonth(1, 3))->includes(new \DateTime("2020-05-15")));
        $this->assertFalse((new DayEveryMonth(1, 4))->includes(new \DateTime("2020-07-22")));
        $this->assertFalse((new DayEveryMonth(1, 5))->includes(new \DateTime("2021-06-29")));

        $this->assertTrue((new DayEveryMonth(2, 1))->includes(new \DateTime("2020-06-02")));
        $this->assertTrue((new DayEveryMonth(3, 2))->includes(new \DateTime("2020-06-10")));
        $this->assertTrue((new DayEveryMonth(4, 3))->includes(new \DateTime("2020-06-18")));
        $this->assertTrue((new DayEveryMonth(5, 4))->includes(new \DateTime("2020-06-26")));
    }

    public function testNegativeCounts()
    {
        $this->assertTrue((new DayEveryMonth(1, -1))->includes(new \DateTime("2020-06-29")));
        $this->assertTrue((new DayEveryMonth(1, -2))->includes(new \DateTime("2020-06-22")));
        $this->assertTrue((new DayEveryMonth(1, -3))->includes(new \DateTime("2020-06-15")));
        $this->assertTrue((new DayEveryMonth(1, -4))->includes(new \DateTime("2020-06-08")));
        $this->assertTrue((new DayEveryMonth(1, -5))->includes(new \DateTime("2020-06-01")));

        $this->assertFalse((new DayEveryMonth(1, -1))->includes(new \DateTime("2021-06-29")));
        $this->assertFalse((new DayEveryMonth(1, -2))->includes(new \DateTime("2020-07-22")));
        $this->assertFalse((new DayEveryMonth(1, -3))->includes(new \DateTime("2020-05-15")));
        $this->assertFalse((new DayEveryMonth(1, -4))->includes(new \DateTime("2020-06-07")));
        $this->assertFalse((new DayEveryMonth(1, -5))->includes(new \DateTime("2020-06-02")));

        $this->assertTrue((new DayEveryMonth(2, -5))->includes(new \DateTime("2020-06-02")));
        $this->assertTrue((new DayEveryMonth(3, -3))->includes(new \DateTime("2020-06-10")));
        $this->assertTrue((new DayEveryMonth(4, -2))->includes(new \DateTime("2020-06-18")));
        $this->assertTrue((new DayEveryMonth(5, -1))->includes(new \DateTime("2020-06-26")));
    }

}
