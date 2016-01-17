<?php

namespace FreeElephants\AltEra\Calendar;

use FreeElephants\AltEra\TimeUnit\DateInterface;
use FreeElephants\AltEra\TimeUnit\MonthInterface;
use FreeElephants\AltEra\Feature\LeapYear\LeapYearFeatureInterface;

/**
 * Facade: main public interface of AltEra package.
 *
 * @author samizdam
 */
interface CalendarInterface
{
    const SEC_PER_DAY = 60 * 60 * 24;

    const DEFAULT_SCALE = self::SEC_PER_DAY;

    /**
     * Name of this Calendar.
     *
     * @return string
     */
    public function getName();

    /**
     * @return int
     */
    public function getInitialTimestamp();

    /**
     * @return number
     */
    public function getScale();

    /**
     * Get alt Date object for current timestamp.
     *
     * @return DateInterface
     */
    public function getCurrentDate();

    /**
     * Get absolute time from initial timestamp to current in AltEra days.
     *
     * @return int
     */
    public function getElapsedDays();

    /**
     * Get absolute time from initial timestamp to current in AltEra years.
     *
     * @return int
     */
    public function getElapsedYears();

    /**
     * Get Months used in this calendar in its order.
     *
     * @return MonthInterface[]
     */
    public function getMonths();

    /**
     * Get number of days in year.
     * If year number not given, return value for current year,
     * else if leap years feature is active, can return different values for leap and non-leap years.
     *
     * @param int $year
     *
     * @return int
     */
    public function getNumberOfDaysInYear($year = null);

    /**
     * Get map of Leap Year Features.
     *
     * @return LeapYearFeatureInterface[]
     */
    public function getLeapYearFeature();

    /**
     * Check that this Calendar has Leap Year Feature.
     *
     * @return bool
     */
    public function hasLeapYearFeature();
}
