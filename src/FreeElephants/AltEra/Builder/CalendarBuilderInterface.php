<?php

namespace FreeElephants\AltEra\Builder;

use FreeElephants\AltEra\Calendar\CalendarInterface;

/**
 * @author samizdam
 */
interface CalendarBuilderInterface
{
    /**
     * @param string $name
     *
     * @return self
     */
    public function setCalendarName($name);

    /**
     * Finalize building, return configured Calendar instance and reset Builder state.
     *
     * @return CalendarInterface
     */
    public function buildCalandar();
}
