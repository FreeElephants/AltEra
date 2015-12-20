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

    const SEC_IN_REAL_DAY = 60 * 60 * 24;

    public function testGetDaysDiff()
    {
        $initialTimestamp = 0;
        $thirdDay = \DateTime::createFromFormat("Y-m-d", "1970-01-03");
        $actualTimestamp = $thirdDay->getTimestamp();
        $scale = self::SEC_IN_REAL_DAY; // equals with real time units.

        $calc = new IntervalCalculator();
        $diff = $calc->getDaysDiff($initialTimestamp, $actualTimestamp, $scale);
        $this->assertEquals(2, $diff);
    }

    public function testGetDaysDiffWithAltScale()
    {
        $initialTimestamp = 0;
        $thirdAltDayDateTime = \DateTime::createFromFormat("Y-m-d H:i:s", "1970-01-02 12:00:01", new \DateTimeZone('UTC'));
        $actualTimestamp = $thirdAltDayDateTime->getTimestamp();
        $scale = self::SEC_IN_REAL_DAY / 2; // half of real time units.

        $calc = new IntervalCalculator();
        $diff = $calc->getDaysDiff($initialTimestamp, $actualTimestamp, $scale);
        $this->assertEquals(3, $diff);
    }
}