<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\Calendar\CalendarInterface;
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