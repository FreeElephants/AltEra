<?php

namespace FreeElephants\AltEra\DateInstantiator;

use FreeElephants\AltEra\CalendarInterface;
use FreeElephants\AltEra\TimeUnit\DateInterface;

/**
 *
 * @author samizdam
 *
 */
interface DateInstantiatorInterface
{

    /**
     * Create Date from configured Calendar for given timestamp.
     *
     * @param CalendarInterface $calendar
     * @param int $timestamp
     * @return DateInterfaces
     */
    public function buildDate(CalendarInterface $calendar, $timestamp);

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