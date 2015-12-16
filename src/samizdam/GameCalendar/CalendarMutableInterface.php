<?php

namespace samizdam\GameCalendar;

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
}