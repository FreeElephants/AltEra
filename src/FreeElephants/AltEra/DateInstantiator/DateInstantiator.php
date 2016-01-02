<?php

namespace FreeElephants\AltEra\DateInstantiator;

use FreeElephants\AltEra\TimeUnit\Date;
use FreeElephants\AltEra\TimeUnit\Month;
use FreeElephants\AltEra\Calendar\CalendarInterface;

/**
 *
 * @author samizdam
 *
 */
class DateInstantiator implements DateInstantiatorInterface
{


    public function buildDate(CalendarInterface $calendar, $timestamp)
    {
        $year = 0;
        $month = new Month('foo', 31);
        $day = 1;
        $absoluteDaysDiff = $this->getDaysDiff($calendar->getInitialTimestamp(), $timestamp, $calendar->getScale());
        return new Date($calendar, $year, $month, $day);
    }

    public function getDaysDiff($initialTimestamp, $actualTimestamp, $scale)
    {
        $timestampDiff = $actualTimestamp - $initialTimestamp;
        return (int) (floor($timestampDiff / $scale));
    }
}