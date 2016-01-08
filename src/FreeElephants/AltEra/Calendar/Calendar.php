<?php

namespace FreeElephants\AltEra\Calendar;

use FreeElephants\AltEra\Exception\ArgumentException;
use FreeElephants\AltEra\TimeUnit\DateInterface;
use FreeElephants\AltEra\TimeUnit\MonthInterface;
use FreeElephants\AltEra\DateInstantiator\DateInstantiator;
use FreeElephants\AltEra\DateInstantiator\DateInstantiatorInterface;

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
     * @param int $timestamp
     */
    public function __construct($timestamp = null)
    {
        $this->setInitialTimestamp($timestamp ?: time());
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

    /**
     * @param int $timestamp
     */
    public function setInitialTimestamp($timestamp)
    {
        $this->initialTimestamp = (int) $timestamp;
    }

    public function getInitialTimestamp()
    {
        return $this->initialTimestamp;
    }

    /**
     * @return DateInterface
     */
    public function getCurrentDate()
    {
        return $this->dateInstatiator->buildDate($this, time());
    }

    /**
     * @return int
     */
    public function getElapsedDays()
    {
    }

    /**
     * (non-PHPdoc).
     *
     * @see \FreeElephants\AltEra\CalendarInterface::getElapsedYears()
     */
    public function getElapsedYears()
    {
    }

    /**
     * (non-PHPdoc).
     *
     * @see \FreeElephants\AltEra\CalendarInterface::getMoths()
     */
    public function getMonths()
    {
        return array_values($this->monthsMap);
    }

    public function getNumberOfDaysInYear()
    {
        $daysByMonths = array_map(function (MonthInterface $month) {
            return $month->getNumberOfDays();
        }, $this->getMonths());

        return array_sum($daysByMonths);
    }
}
