<?php

namespace FreeElephants\AltEra\Builder;

use FreeElephants\AltEra\TimeUnit\Month;
use FreeElephants\AltEra\Calendar\Calendar;

/**
 * Use this Builder for create Calendar with Month support without Season Feature.
 * TODO rename to MonthsBasedBuilder.
 *
 * @author samizdam
 */
class MonthAwareCalendarBuilder extends AbstractCalendarBuilder implements CalendarBuilderInterface
{
    protected function createCalendarInstance()
    {
        return new Calendar();
    }

    /**
     * (non-PHPdoc).
     *
     * @see \FreeElephants\AltEra\CalendarBuilderInterface::addMonth()
     */
    public function addMonth($name, $numberOfDays)
    {
        $month = new Month($name, $numberOfDays);
        $this->getCalendar()->addMonth($month);

        return $this;
    }

    protected function concreteBuild()
    {
        return $this->getCalendar();
    }
}
