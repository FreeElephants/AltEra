<?php

namespace FreeElephants\AltEra\Builder;

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
    private $calendar;

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
        $this->getCalendar()->setName($name);
    }


    /**
     *
     * @return CalendarInterface
     */
    final public function buildCalandar()
    {
        $calendar = $this->concreteBuild();
        $this->setInitialState();
        return $calendar;
    }

    /**
     *
     *
     * @return CalendarInterface
     */
    abstract protected function concreteBuild();

    /**
     *
     * @return void
     */
    public function setInitialState()
    {
        $this->calendar = $this->createCalendarInstance();
    }

    /**
     *
     *
     * @return CalendarInterface
     */
    protected function getCalendar()
    {
        return $this->calendar;
    }

}