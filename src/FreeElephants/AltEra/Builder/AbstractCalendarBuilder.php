<?php

namespace FreeElephants\AltEra\Builder;


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

    public function __construct()
    {
        $this->setInitialState();
    }

    /**
     *
     * @abstract
     * @return CalendarInterface
     */
    protected abstract function createCalendarInstance();

    public function setCalendarName($name)
    {
        $this->calendar->setName($name);
    }


    /**
     * TODO make abstract and implement login into this method.
     *
     * @return CalendarInterface
     */
    public function buildCalandar()
    {
        $calendar = $this->calendar;
        $this->setInitialState();
        return $calendar;
    }

    /**
     *
     * @return void
     */
    public function setInitialState()
    {
        $this->calendar = $this->createCalendarInstance();
    }

}