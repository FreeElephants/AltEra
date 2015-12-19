<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\TimeUnit\MonthInterface;
/**
 *
 * @author samizdam
 * @internal
 */
interface CalendarMutableInterface extends CalendarInterface
{

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
    public function setInitialTImestamp($timestamp);

    /**
     * Set scale for mapping between real and alt dates.
     *
     * @param int $realSecPerAltDay
     * @return void
     */
    public function setScale($realSecPerAltDay);
}