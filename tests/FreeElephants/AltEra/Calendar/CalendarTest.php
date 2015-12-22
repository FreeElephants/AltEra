<?php

namespace FreeElephants\AltEra\Calendar;

use FreeElephants\AltEra\TimeUnit\DateInterface;
use FreeElephants\AltEra\TimeUnit\MonthInterface;
use FreeElephants\AltEra\Exception\ArgumentException;
use FreeElephants\AltEra\AbstractCalendarUnitTestCase;

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

    public function testGetNumberOfDaysInYear()
    {
        $calendar = new Calendar();
        $month = $this->getMock(MonthInterface::class);
        $month->method("getNumberOfDays")->willReturn(256);
        $calendar->addMonth($month);
        $this->assertEquals(256, $calendar->getNumberOfDaysInYear());
    }

    public function testGetName()
    {
        $calendar = new Calendar();
        $calendar->setName("foo");
        $this->assertEquals("foo", $calendar->getName());
    }
}