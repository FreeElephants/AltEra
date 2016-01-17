<?php

namespace FreeElephants\AltEra\Calendar;

use FreeElephants\AltEra\Exception\ArgumentException;
use FreeElephants\AltEra\TimeUnit\MonthInterface;
use FreeElephants\AltEra\DateInstantiator\DateInstantiator;
use FreeElephants\AltEra\DateInstantiator\DateInstantiatorInterface;
use FreeElephants\AltEra\Feature\LeapYear\LeapYearFeatureInterface;

/**
 * @author samizdam
 */
class Calendar implements CalendarMutableInterface
{
    /**
     * @var int
     */
    private $initialTimestamp;

    /**
     * @var int
     */
    private $scale = self::DEFAULT_SCALE;

    /**
     * @var array
     */
    private $monthsMap = [];

    /**
     * @var DateInstantiatorInterface
     */
    private $dateInstatiator;

    /**
     * @var string
     */
    private $name;

    /**
     * @var LeapYearFeatureInterface
     */
    private $leapYearFeature;

    /**
     * @param int $initialTimestamp
     */
    public function __construct($initialTimestamp = null)
    {
        $this->setInitialTimestamp($initialTimestamp ?: time());
        $this->dateInstatiator = new DateInstantiator();
    }

    public function setName($name)
    {
        $this->name = (string) $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setScale($realSecPerAltDay)
    {
        $this->scale = (int) $realSecPerAltDay;
    }

    public function getScale()
    {
        return $this->scale;
    }

    public function addMonth(MonthInterface $month)
    {
        $monthName = $month->getName();
        if (array_key_exists($monthName, $this->monthsMap)) {
            throw new ArgumentException("Month '{$monthName}' already exists in this calendar. ");
        } else {
            $this->monthsMap[$monthName] = $month;
        }
    }

    public function setLeapYearFeature(LeapYearFeatureInterface $feature)
    {
        $this->leapYearFeature = $feature;
    }

    public function getLeapYearFeature()
    {
        return $this->leapYearFeature;
    }

    public function hasLeapYearFeature()
    {
        return $this->leapYearFeature !== null;
    }

    public function setInitialTimestamp($timestamp)
    {
        $this->initialTimestamp = (int) $timestamp;
    }

    public function getInitialTimestamp()
    {
        return $this->initialTimestamp;
    }

    public function getCurrentDate()
    {
        return $this->dateInstatiator->buildDate($this, time());
    }

    public function getElapsedDays()
    {
    }

    public function getElapsedYears()
    {
    }

    public function getMonths()
    {
        return array_values($this->monthsMap);
    }

    public function getNumberOfDaysInYear($year = null)
    {
        if ($this->hasLeapYearFeature() && $year != null) {
            $yearNumber = (int) $year;

            $feature = $this->getLeapYearFeature();
            if ($feature->getDetector()->isLeapYear($yearNumber)) {
                $months = $feature->getMonths();
            }
        } else {
            $months = $this->getMonths();
        }
        $daysByMonths = array_map(function (MonthInterface $month) {
            return $month->getNumberOfDays();
        }, $months);

        return array_sum($daysByMonths);
    }
}
