<?php

namespace FreeElephants\AltEra\TimeUnit;

/**
 *
 * @author samizdam
 *
 */
class Date implements DateInterface
{

    /**
     *
     * @var int
     */
    private $year;

    /**
     *
     * @var MonthInterface
     */
    private $month;

    /**
     *
     * @var int
     */
    private $day;

    /**
     *
     * @param int $year
     * @param MonthInterface $month
     * @param int $dayOfMonth
     */
    public function __construct($year, MonthInterface $month, $dayOfMonth)
    {
        $this->year = $year;
        $this->month = $month;
        $this->day = $dayOfMonth;
    }

    public function getDayOfMonth()
    {
        return $this->day;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function getYear()
    {
        return $this->year;
    }

}