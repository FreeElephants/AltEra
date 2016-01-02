<?php

namespace FreeElephants\AltEra\TimeUnit;

use FreeElephants\AltEra\AbstractCalendarUnitTestCase;
use FreeElephants\AltEra\Calendar\CalendarInterface;

/**
 *
 * @author samizdam
 *
 */
class DateTest extends AbstractCalendarUnitTestCase
{

    public function testGetDayOfMonth()
    {
        $calendar = $this->getMock(CalendarInterface::class);
        $month = $this->getMock(MonthInterface::class);
        $date = new Date($calendar, 1999, $month, 1);
        $this->assertEquals(1, $date->getDayOfMonth());
    }

    public function testGetMonth()
    {
        $calendar = $this->getMock(CalendarInterface::class);
        $month = $this->getMock(MonthInterface::class);
        $date = new Date($calendar, 1999, $month, 1);
        $this->assertEquals($month, $date->getMonth());
    }

    public function testGetYear()
    {
        $calendar = $this->getMock(CalendarInterface::class);
        $month = $this->getMock(MonthInterface::class);
        $date = new Date($calendar, 1999, $month, 1);
        $this->assertEquals(1999, $date->getYear());
    }

    public function testFormat()
    {
        $calendar = $this->getMock(CalendarInterface::class);
        $month = $this->getMock(MonthInterface::class);
        $month->method('getName')->willReturn('December');
        $date = new Date($calendar, 1913, $month, 1);
        $this->assertEquals('1913, December 1', $date->format('Y, F j'));
    }

}