<?php

namespace FreeElephants\AltEra\TimeUnit;

use FreeElephants\AltEra\AbstractCalendarUnitTestCase;

/**
 *
 * @author samizdam
 *
 */
class DateTest extends AbstractCalendarUnitTestCase
{

    public function testGetDayOfMonth()
    {
        $month = $this->getMock(MonthInterface::class);
        $date = new Date(1999, $month, 1);
        $this->assertEquals(1, $date->getDayOfMonth());
    }

    public function testGetMonth()
    {
        $month = $this->getMock(MonthInterface::class);
        $date = new Date(1999, $month, 1);
        $this->assertEquals($month, $date->getMonth());
    }

    public function testGetYear()
    {
        $month = $this->getMock(MonthInterface::class);
        $date = new Date(1999, $month, 1);
        $this->assertEquals(1999, $date->getYear());
    }

}