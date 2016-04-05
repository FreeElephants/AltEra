<?php

namespace FreeElephants\AltEra\Builder;

use FreeElephants\AltEra\Calendar\CalendarInterface;
use FreeElephants\AltEra\AbstractCalendarUnitTestCase;
use FreeElephants\AltEra\Feature\LeapYear\JulianLeapYearDetector;

/**
 * @author samizdam
 */
class MonthAwareCalendarBuilderTest extends AbstractCalendarUnitTestCase
{
    public function testGetCalendar()
    {
        $builder = new MonthAwareCalendarBuilder();
        $this->assertInstanceOf(CalendarInterface::class, $builder->buildCalandar());
    }

    public function testAddMonth()
    {
        $builder = new MonthAwareCalendarBuilder();
        $builder->addMonth('example', 10);
        $this->assertCount(1, $builder->buildCalandar()->getMonths());
    }

    public function testSetLeapFeature()
    {
        $builder = new MonthAwareCalendarBuilder();
        $builder->setLeapYearFeature(JulianLeapYearDetector::class, []);
        $calendar = $builder->buildCalandar();
        $this->assertTrue($calendar->hasLeapYearFeature());
    }
}
