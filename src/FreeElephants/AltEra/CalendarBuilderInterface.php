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