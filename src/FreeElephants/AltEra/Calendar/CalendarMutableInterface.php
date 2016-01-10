<?php

namespace FreeElephants\AltEra\Calendar;

use FreeElephants\AltEra\TimeUnit\MonthInterface;

/**
 * @author samizdam
 *
 * @internal
 */
interface CalendarMutableInterface extends CalendarInterface
{
    /**
     * Set name for Calendar.
     *
     * @param string $name
     */
    public function setName($name);

    /**
     * @param MonthInterface $month
     */
    public function addMonth(MonthInterface $month);

    /**
     * Set timestamp for 1 day of first calender year.
     *
     * @param int $timestamp
     */
    public function setInitialTimestamp($timestamp);

    /**
     * Set scale for mapping between real and alt dates.
     *
     * @param int $realSecPerAltDay
     */
    public function setScale($realSecPerAltDay);
}
