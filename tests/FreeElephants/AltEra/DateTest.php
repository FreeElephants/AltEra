<?php

namespace FreeElephants\AltEra;

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
        $this->markTestSkipped("Not implemented now");
        $calendar = new Calendar();
        $calendar->addMonth(new Month("foo", 1));
        $date = new Date($calendar);
        $this->assertInstanceOf(MonthInterface::class, $date->getMonth());
    }

}