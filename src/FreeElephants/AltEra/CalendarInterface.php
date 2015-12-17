<?php

namespace FreeElephants\AltEra;

/**
 * Facade
 *
 * @author samizdam
 *
 * @package FreeElephants\AltEra
 */
interface CalendarInterface
{

    /**
     *
     *
     * @param \DateTimeInterface $datetime
     * @return void
     */
    public function setInitialDateTime(\DateTimeInterface $datetime);

    /**
     * Get Date object for current timestamp with offset from initial.
     *
     * @return int
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