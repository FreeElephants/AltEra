<?php

namespace FreeElephants\AltEra;

/**
 *
 * @author samizdam
 *
 */
class MonthTest extends AbstractCalendarUnitTestCase
{

    public function testGetName()
    {
        $month = new Month("foo", 1);
        $this->assertEquals("foo", $month->getName());
    }

    public function testGetNumberOfDays()
    {
        $month = new Month("foo", 1);
        $this->assertEquals(1, $month->getNumberOfDays());
    }

}