<?php

namespace FreeElephants\AltEra\TimeUnit;

use FreeElephants\AltEra\Formatter\FormatterInterface;
use FreeElephants\AltEra\Calendar\CalendarInterface;
use FreeElephants\AltEra\Formatter\Formatter;
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
     * @var CalendarInterface
     */
    private $calendar;

    /**
     *
     * @var FormatterInterface
     */
    private $formatter;

    /**
     *
     * @param int $year
     * @param MonthInterface $month
     * @param int $dayOfMonth
     */
    public function __construct(CalendarInterface $calendar, $year, MonthInterface $month, $dayOfMonth)
    {
        $this->calendar = $calendar;
        $this->year = $year;
        $this->month = $month;
        $this->day = $dayOfMonth;
        $this->formatter = new Formatter();
    }

    public function getCalendar()
    {
        return $this->calendar;
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

    public function format($format)
    {
        return $this->formatter->format($this, $format);
    }
}