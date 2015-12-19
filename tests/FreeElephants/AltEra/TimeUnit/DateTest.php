<?php

namespace FreeElephants\AltEra\TimeUnit;

use FreeElephants\AltEra\AbstractCalendarUnitTestCase;
use FreeElephants\AltEra\Calendar;
use FreeElephants\AltEra\Month;
use FreeElephants\AltEra\MonthInterface;

/**
 *
 * @author samizdam
 *
 */
class DateTest extends AbstractCalendarUnitTestCase
{

    public function testGetDay()
    {
        $calendar = new Calendar();
        $calendar->addMonth(new Month("foo", 1));
        $date = new Date($calendar);
        $this->assertEquals(0, $date->getDay());
    }

    public function testGetMonth()
    {
        $this->markTestIncomplete();
        $calendar = new Calendar();
        $calendar->addMonth(new Month("foo", 1));
        $date = new Date($calendar);
        $this->assertInstanceOf(MonthInterface::class, $date->getMonth());
    }

}