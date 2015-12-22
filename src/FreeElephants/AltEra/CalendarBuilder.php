<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\TimeUnit\Month;

/**
 *
 * @author samizdam
 *
 */
class CalendarBuilder implements CalendarBuilderInterface
{

    const DEFAULT_CALENDAR_NAME = "AltEra Example Calandar";

    /**
     *
     * @var CalendarMutableInterface
     */
    private $calendar;

    /**
     * Create builder for new Calendar object
     *
     * @return return_type
     */
    public function __construct($calendarName = self::DEFAULT_CALENDAR_NAME)
    {
        $this->calendar = new Calendar();
        $this->setCalendarName($calendarName);
    }

    public function setCalendarName($name)
    {
        $this->calendar->setName($name);
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