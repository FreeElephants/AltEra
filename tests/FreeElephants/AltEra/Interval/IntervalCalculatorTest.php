<?php

namespace FreeElephants\AltEra\Interval;

use FreeElephants\AltEra\AbstractCalendarUnitTestCase;

/**
 *
 * @author samizdam
 *
 */
class IntervalCalculatorTest extends AbstractCalendarUnitTestCase
{

    public function testGetDaysDiff()
    {
        $secPerDay = 60 * 60 * 24;

        $initialTimestamp = 0;
        $thirdDay = \DateTime::createFromFormat("Y-m-d", "1970-01-03");
        $actualTimestamp = $thirdDay->getTimestamp();
        $scale = $secPerDay; // equals with real time units.

        $calc = new IntervalCalculator();
        $diff = $calc->getDaysDiff($initialTimestamp, $actualTimestamp, $scale);
        $this->assertEquals(2, $diff);
    }
}