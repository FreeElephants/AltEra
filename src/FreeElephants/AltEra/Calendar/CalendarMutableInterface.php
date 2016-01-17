<?php

namespace FreeElephants\AltEra\Calendar;

use FreeElephants\AltEra\TimeUnit\MonthInterface;
use FreeElephants\AltEra\Feature\LeapYear\LeapYearFeatureInterface;

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
     * Add and enable leap years feature for this calendar.
     *
     * @param LeapYearFeatureInterface $feature
     */
    public function setLeapYearFeature(LeapYearFeatureInterface $feature);

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
