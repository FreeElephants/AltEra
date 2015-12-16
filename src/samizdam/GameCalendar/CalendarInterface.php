<?php

namespace samizdam\GameCalendar;

/**
 * Facade
 *
 * @author samizdam
 *
 * @package samizdam\GameCalendar
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
     *
     *
     * @return int
     */
    public function getCurrentDate();

    /**
     *
     *
     * @return int
     */
    public function getElapsedDays();

    /**
     *
     *
     * @return int
     */
    public function getElapsedYears();

    /**
     *
     *
     * @return MonthInterface[]
     */
    public function getMonths();

}