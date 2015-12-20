<?php

namespace FreeElephants\AltEra\Interval;

use FreeElephants\AltEra\CalendarInterface;

/**
 *
 * @author samizdam
 *
 */
interface IntervalCalculatorInterface
{

    /**
     * Get differance between timestamp in AltEra Calendar Days.
     * 0 - if diff less then full day.
     *
     * @param int $initialTimestamp
     * @param int $actualTimestamp
     * @param int $scale
     * @return int
     */
    public function getDaysDiff($initialTimestamp, $actualTimestamp, $scale);

    /**
     * Get differance between timestamp
     *
     * @param CalendarInterface $calendar
     * @param int $actualTimestamp
     * @return int
     */
//     public function getYearsDiff(CalendarInterface $calendar, $actualTimestamp);

}