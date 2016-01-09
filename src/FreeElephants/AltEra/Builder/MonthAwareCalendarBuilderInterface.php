<?php

namespace FreeElephants\AltEra\Builder;

/**
 * @author samizdam
 */
interface MonthAwareCalendarBuilderInterface extends CalendarBuilderInterface
{
    /**
     * Use this method for create Calendar without Seasons.
     *
     * @param string $name
     * @param int    $numberOfDays
     *
     * @return self
     */
    public function addMonth($name, $numberOfDays);
}
