<?php

namespace FreeElephants\AltEra\TimeUnit;

use FreeElephants\AltEra\AbstractCalendarUnitTestCase;

/**
 *
 * @author samizdam
 *
 */
class SeasonTest extends AbstractCalendarUnitTestCase
{

    public function testGetName()
    {
        $month = $this->getMock(MonthInterface::class);
        $season = new Season("foo", [$month]);
        $this->assertEquals("foo", $season->getName());
    }

    public function testGetMonths()
    {
        $month = $this->getMock(MonthInterface::class);
        $season = new Season("foo", [$month]);
        $this->assertCount(1, $season->getMonths());
    }

    public function testGetNumberOfDays()
    {
        $month = $this->getMock(MonthInterface::class);
        $month->method("getNumberOfDays")->willReturn(31);
        $season = new Season("foo", [$month]);
        $this->assertEquals(31, $season->getNumberOfDays());
    }
}