<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\TimeUnit\DateInterface;
use FreeElephants\AltEra\TimeUnit\MonthInterface;
use FreeElephants\AltEra\Exception\ArgumentException;

/**
 *
 * @author samizdam
 *
 */
class CalendarTest extends AbstractCalendarUnitTestCase
{

    public function testGetCurrentDate()
    {
        $calendar = new Calendar();
        $this->assertInstanceOf(DateInterface::class, $calendar->getCurrentDate());
    }

    public function testAddMonthException()
    {
        $calendar = new Calendar();
        $month = $this->getMock(MonthInterface::class);
        $calendar->addMonth($month);
        $this->setExpectedException(ArgumentException::class);
        $calendar->addMonth($month);
    }

    public function testGetElapsedDays()
    {
        $calendar = new Calendar();
        $this->assertEquals(0, $calendar->getElapsedDays());
    }

    public function testGetElapsedYears()
    {
        $calendar = new Calendar();
        $this->assertEquals(0, $calendar->getElapsedYears());
    }

    public function testGetScale()
    {
        $calendar = new Calendar();
        $calendar->setScale(1);
        $this->assertEquals(1, $calendar->getScale());
    }
}