<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\TimeUnit\Month;

/**
 *
 * Use this Builder for create Calendar with Month support without Season Feature.
 *
 * @author samizdam
 *
 */
class MonthAwareCalendarBuilder extends AbstractCalendarBuilder implements CalendarBuilderInterface
{


    /**
     *
     * (non-PHPdoc)
     * @see \FreeElephants\AltEra\CalendarBuilderInterface::addMonth()
     *
     */
    public function addMonth($name, $numberOfDays){
        $month = new Month($name, $numberOfDays);
        $this->calendar->addMonth($month);
        return $this;
    }
}