<?php

namespace FreeElephants\AltEra\Calendar;

use FreeElephants\AltEra\TimeUnit\MonthInterface;

/**
 *
 * @author samizdam
 * @internal
 */
interface CalendarMutableInterface extends CalendarInterface
{

    /**
     * Set name for Calendar
     *
     * @param string $name
     * @return void
     */
    public function setName($name);

    /**
     *
     *
     * @param MonthInterface $month
     * @return void
     */
    public function addMonth(MonthInterface $month);

    /**
     *
     *
     * @param int $timestamp
     * @return void
     */
    public function setInitialTimestamp($timestamp);

    /**
     * Set scale for mapping between real and alt dates.
     *
     * @param int $realSecPerAltDay
     * @return void
     */
    public function setScale($realSecPerAltDay);
}