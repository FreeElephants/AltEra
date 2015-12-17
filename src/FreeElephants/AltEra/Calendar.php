<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\Exception\ArgumentException;
/**
 *
 * @author samizdam
 *
 */
class Calendar implements CalendarMutableInterface
{

    private $monthsMap = [];

    public function __construct(\DateTimeInterface $datetime = null)
    {
        $this->setInitialDateTime($datetime ?: new \DateTime());
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
     * @param \DateTimeInterface $datetime
     * @return void
     */
    public function setInitialDateTime(\DateTimeInterface $datetime)
    {

    }

    /**
     *
     *
     * @return int
     */
    public function getCurrentDate(){
        return new Date();
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