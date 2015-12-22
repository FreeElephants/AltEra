<?php

namespace FreeElephants\AltEra;

/**
 *
 * @author samizdam
 *
 */
interface CalendarBuilderInterface
{

    /**
     *
     * @param string $name
     * @param int $numberOfDays
     * @return self
     */
    public function addMonth($name, $numberOfDays);

    /**
     *
     *
     * @param string $name
     * @return self
     */
    public function setCalendarName($name);

    /**
     *
     *
     * @return CalendarInterface
     */
    public function getCalendar();
}