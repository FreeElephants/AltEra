<?php

namespace FreeElephants\AltEra\Builder;

use FreeElephants\AltEra\Calendar\CalendarInterface;
use FreeElephants\AltEra\AbstractCalendarUnitTestCase;

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