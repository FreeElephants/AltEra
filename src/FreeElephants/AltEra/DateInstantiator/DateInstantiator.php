<?php

namespace FreeElephants\AltEra\DateInstantiator;

use FreeElephants\AltEra\CalendarInterface;
use FreeElephants\AltEra\TimeUnit\Date;
use FreeElephants\AltEra\TimeUnit\Month;

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
        return new Date($year, $month, $day);
    }

    public function getDaysDiff($initialTimestamp, $actualTimestamp, $scale)
    {
        $timestampDiff = $actualTimestamp - $initialTimestamp;
        return (int) (floor($timestampDiff / $scale));
    }
}