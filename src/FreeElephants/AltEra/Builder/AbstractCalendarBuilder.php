<?php

namespace FreeElephants\AltEra\Builder;

use FreeElephants\AltEra\Calendar\CalendarMutableInterface;
use FreeElephants\AltEra\Calendar\CalendarInterface;
use FreeElephants\AltEra\Feature\LeapYear\BaseLeapYearFeature;

/**
 * @author samizdam
 */
abstract class AbstractCalendarBuilder implements CalendarBuilderInterface
{
    /**
     * @var string
     */
    const DEFAULT_CALENDAR_NAME = 'AltEra Example Calandar';

    /**
     * @var CalendarMutableInterface
     */
    private $calendar;

    private $leapYearFeaturesMap;

    public function __construct()
    {
        $this->setInitialState();
        $this->leapYearFeaturesMap = new \SplObjectStorage();
    }

    /**
     * @abstract
     *
     * @return CalendarInterface
     */
    abstract protected function createCalendarInstance();

    public function setCalendarName($name)
    {
        $this->getCalendar()->setName($name);
    }

    public function setLeapYearFeature($detectorClassName, array $monthData)
    {
    }

    /**
     * @return CalendarInterface
     */
    final public function buildCalandar()
    {
        $calendar = $this->concreteBuild();
        $this->setInitialState();

        return $calendar;
    }

    /**
     * @return CalendarInterface
     */
    abstract protected function concreteBuild();

    /**
     *
     */
    public function setInitialState()
    {
        $this->calendar = $this->createCalendarInstance();
    }

    /**
     * @return CalendarInterface
     */
    protected function getCalendar()
    {
        return $this->calendar;
    }
}
