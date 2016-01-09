<?php

namespace FreeElephants\AltEra\DateInstantiator;

use FreeElephants\AltEra\TimeUnit\Date;
use FreeElephants\AltEra\Calendar\CalendarInterface;

/**
 * @author samizdam
 */
class DateInstantiator implements DateInstantiatorInterface
{
    public function buildDate(CalendarInterface $calendar, $timestamp)
    {
        $year = $this->getYearsDiff($calendar, $timestamp);
        $dayOfYear = $this->getDayOfYear($calendar, $timestamp);
        $month = $this->getMonthByDayOfYear($calendar, $dayOfYear);
        $day = $this->getDayOfMonth($calendar, $dayOfYear);
        return new Date($calendar, $year, $month, $day);
    }

    public function getDaysDiff($initialTimestamp, $actualTimestamp, $scale)
    {
        $timestampDiff = $actualTimestamp - $initialTimestamp;

        return (int) (floor($timestampDiff / $scale));
    }

    public function getYearsDiff(CalendarInterface $calendar, $timestamp)
    {
        $absoluteDaysDiff = $this->getDaysDiff($calendar->getInitialTimestamp(), $timestamp, $calendar->getScale());
        $daysInYear = $calendar->getNumberOfDaysInYear();
        $year = (int) (floor($absoluteDaysDiff / $daysInYear));

        return $year;
    }

    public function getDayOfYear(CalendarInterface $calendar, $timestamp)
    {
        $absoluteDaysDiff = $this->getDaysDiff($calendar->getInitialTimestamp(), $timestamp, $calendar->getScale());
        $daysInYear = $calendar->getNumberOfDaysInYear();

        return $absoluteDaysDiff % $daysInYear;
    }

    public function getMonthByDayOfYear(CalendarInterface $calendar, $dayOfYear)
    {
        $allMonth = $calendar->getMonths();
        $offset = 0;

        foreach ($allMonth as $monthNumber => $month) {
            $offset += $month->getNumberOfDays();
            if ($offset >= $dayOfYear) {
                return $allMonth[$monthNumber];
            }
        }
    }

    public function getDayOfMonth(CalendarInterface $calendar, $dayOfYear)
    {
        $allMonth = $calendar->getMonths();
        $offset = 0;
        foreach ($allMonth as $monthNumber => $month) {
            $offset += $month->getNumberOfDays();
            if ($offset >= $dayOfYear) {
                return $offset - $dayOfYear;
            }
        }
    }
}
