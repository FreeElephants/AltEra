<?php

namespace samizdam\GameCalendar;

/**
 *
 * @author samizdam
 *
 */
class CalendarBuilderTest extends AbstractCalendarUnitTestCase
{

    public function testGetCalendar()
    {
        $builder = new CalendarBuilder();
        $this->assertInstanceOf(CalendarInterface::class, $builder->getCalendar());
    }

    public function testAddMonth()
    {
        $builder = new CalendarBuilder();
        $builder->addMonth("example", 10);
        $this->assertCount(1, $builder->getCalendar()->getMonths());
    }

}