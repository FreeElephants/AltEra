<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\Exception\ArgumentException;
use FreeElephants\AltEra\TimeUnit\Date;
use FreeElephants\AltEra\TimeUnit\DateInterface;
use FreeElephants\AltEra\TimeUnit\MonthInterface;
use FreeElephants\AltEra\DateInstantiator\DateInstantiator;
/**
 *
 * @author samizdam
 *
 */
class Calendar implements CalendarMutableInterface
{

    private $initialTimestamp;

    private $scale = self::DEFAULT_SCALE;

    private $monthsMap = [];

    private $dateInstatiator;


    /**
     *
     *
     * @param unknown $timestamp
     * @return return_type
     */
    public function __construct($timestamp = null)
    {
        $this->setInitialTimestamp($timestamp ?: time());
        $this->dateInstatiator = new DateInstantiator();
    }

    public function setScale($realSecPerAltDay)
    {
        $this->scale = $realSecPerAltDay;
    }

    public function getScale()
    {
        return $this->scale;
    }

    public function addMonth(MonthInterface $month)
    {
        $monthName = $month->getName();
        if(array_key_exists($monthName, $this->monthsMap)){
            throw new ArgumentException("Month '{$monthName}' already exists in this calendar. ");
        } else {
            $this->monthsMap[$monthName] = $month;
        }

    }

    /**
     *
     *
     * @param int $timestamp
     * @return void
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
     *
     *
     * @return DateInterface
     */
    public function getCurrentDate(){
        return $this->dateInstatiator->buildDate($this, time());
    }

    /**
     *
     *
     * @return int
     */
    public function getElapsedDays(){

    }

    /**
     *
     * (non-PHPdoc)
     * @see \FreeElephants\AltEra\CalendarInterface::getElapsedYears()
     *
     */
    public function getElapsedYears(){

    }


    /**
     *
     * (non-PHPdoc)
     * @see \FreeElephants\AltEra\CalendarInterface::getMoths()
     *
     */
    public function getMonths(){

        return array_values($this->monthsMap);
    }


}