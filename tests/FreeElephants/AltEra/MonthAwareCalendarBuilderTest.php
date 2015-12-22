<?php

namespace FreeElephants\AltEra;

/**
 *
 * @author samizdam
 *
 */
class MonthAwareCalendarBuilderTest extends AbstractCalendarUnitTestCase
{

    public function testGetCalendar()
    {
        $builder = new MonthAwareCalendarBuilder();
        $this->assertInstanceOf(CalendarInterface::class, $builder->getCalendar());
    }

    public function testAddMonth()
    {
        $builder = new MonthAwareCalendarBuilder();
        $builder->addMonth("example", 10);
        $this->assertCount(1, $builder->getCalendar()->getMonths());
    }

}