<?php

namespace FreeElephants\AltEra\TimeUnit;

use FreeElephants\AltEra\CalendarInterface;
use FreeElephants\AltEra\DateInstantiator\DateInstantiator;

/**
 *
 * @author samizdam
 *
 */
class Date implements DateInterface
{

    private $calendar;

    private $timestamp;

    private $day;

    private $month;

    /**
     *
     * if $timestamp is null, current value will be use for calculation
     *
     * @param CalendarInterface $calendar
     * @param int $timestamp
     */
    public function __construct(CalendarInterface $calendar, $timestamp = null)
    {
        $this->calendar = $calendar;
        $this->timestamp = $timestamp ? : time();
        $this->initDateValues();
    }

    private function initDateValues()
    {
        $calculator = new DateInstantiator();
        $this->day = $calculator->getDaysDiff($this->calendar->getInitialTimestamp(), $this->timestamp, $this->calendar->getScale());
    }

    public function getDay()
    {
        return $this->day;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function getYear()
    {

    }

}