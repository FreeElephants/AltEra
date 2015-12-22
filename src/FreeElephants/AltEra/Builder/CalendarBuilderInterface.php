<?php

namespace FreeElephants\AltEra\Builder;

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