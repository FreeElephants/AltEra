<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\TimeUnit\DateInterface;
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
}