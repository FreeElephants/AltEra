<?php

namespace FreeElephants\AltEra;

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