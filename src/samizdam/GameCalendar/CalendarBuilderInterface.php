<?php

namespace samizdam\GameCalendar;

/**
 *
 * @author samizdam
 *
 */
interface CalendarBuilderInterface
{

    /**
     *
     * @param strint $name
     * @param int $numberOfDays
     * @return self
     */
    public function addMonth($name, $numberOfDays);

    /**
     *
     *
     * @return CalendarInterface
     */
    public function getCalendar();
}