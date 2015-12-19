<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\TimeUnit\DateInterface;
use FreeElephants\AltEra\TimeUnit\MonthInterface;

/**
 * Facade
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
     * Get Date object for current timestamp with offset from initial.
     *
     * @return DateInterface
     */
    public function getCurrentDate();

    /**
     * Get days from initial.
     *
     * @return int
     */
    public function getElapsedDays();

    /**
     * Get years from initial.
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