<?php

namespace FreeElephants\AltEra\Builder;

use FreeElephants\AltEra\Calendar\CalendarMutableInterface;
use FreeElephants\AltEra\Calendar\CalendarInterface;
use FreeElephants\AltEra\Feature\LeapYear\BaseLeapYearFeature;
use FreeElephants\AltEra\TimeUnit\Month;

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

    private $leapYearDetector;

    private $leapYearMonthsData = [];

    private $leapFeature;

    public function __construct()
    {
        $this->setInitialState();
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

    public function setLeapYearFeature($detectorClassName, array $monthsData)
    {
        $detector = new $detectorClassName;
        $feature = new BaseLeapYearFeature($detector);
        $months = [];
        foreach ($monthsData as $monthData) {
            $name = $monthData['name'];
            $numberOfDays = $monthData['numberOfDays'];
            $months[] = new Month($name, $numberOfDays);
        }
        $feature->setMonths($months);
        $this->leapFeature = $feature;
    }

    /**
     * @return CalendarInterface
     */
    final public function buildCalandar()
    {
        $calendar = $this->concreteBuild();
        if($feature = $this->leapFeature){
            $monthsForLeapYear = [];

            foreach ($calendar->getMonths() as $month){
                foreach ($feature->getMonths() as $leapMonth) {
                    if($month->getName() === $leapMonth->getName()) {
                        $monthsForLeapYear[] = $leapMonth;
                    } else {
                        $monthsForLeapYear[] = $month;
                    }
                }
            }
            $feature->setMonths($monthsForLeapYear);
            $calendar->setLeapYearFeature($feature);
        }
        $this->setInitialState();

        return $calendar;
    }

    /**
     * @return CalendarMutableInterface
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
