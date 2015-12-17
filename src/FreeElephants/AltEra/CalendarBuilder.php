<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\Exception\ArgumentException;
/**
 *
 * @author samizdam
 *
 */
class CalendarBuilder implements CalendarBuilderInterface
{


    private $calendar;

    /**
     * Create builder for new Calendar object
     *
     * @return return_type
     */
    public function __construct()
    {
        $this->calendar = new Calendar();

    }

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

    /**
     *
     * (non-PHPdoc)
     * @see \FreeElephants\AltEra\CalendarBuilderInterface::getCalendar()
     *
     * @return CalendarInterface
     */
    public function getCalendar()
    {
        return $this->calendar;
    }
}