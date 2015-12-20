<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\TimeUnit\DateInterface;
use FreeElephants\AltEra\TimeUnit\MonthInterface;

/**
 * Facade: main public interface of AltEra package.
 *
 * @author samizdam
 *
 * @package FreeElephants\AltEra
 */
interface CalendarInterface
{

    const SEC_PER_DAY = 60 * 60 * 24;

    const DEFAULT_SCALE = self::SEC_PER_DAY;

    /**
     *
     *
     * @return int
     */
    public function getInitialTimestamp();

    /**
     *
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
     * Get absolute time from initial timestamp to current in alt days.
     *
     * @return int
     */
    public function getElapsedDays();

    /**
     * Get absolute time from initial timestamp to current in alt years.
     *
     * @return int
     */
    public function getElapsedYears();

    /**
     * Get Months uses in this calendar in its order.
     *
     * @return MonthInterface[]
     */
    public function getMonths();

}