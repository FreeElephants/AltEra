<?php

namespace FreeElephants\AltEra;


use FreeElephants\AltEra\Calendar\Calendar;
use FreeElephants\AltEra\Calendar\CalendarMutableInterface;
use FreeElephants\AltEra\Calendar\CalendarInterface;
/**
 *
 * @author samizdam
 *
 */
abstract class AbstractCalendarBuilder implements CalendarBuilderInterface
{
    /**
     *
     * @var string
     */
    const DEFAULT_CALENDAR_NAME = "AltEra Example Calandar";

    /**
     *
     * @var CalendarMutableInterface
     */
    protected $calendar;

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
     * @see \FreeElephants\AltEra\CalendarBuilderInterface::getCalendar()
     *
     * @return CalendarInterface
     */
    public function getCalendar()
    {
        return $this->calendar;
    }

}