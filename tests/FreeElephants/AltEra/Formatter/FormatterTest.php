<?php

namespace FreeElephants\AltEra\Formatter;

use FreeElephants\AltEra\AbstractCalendarUnitTestCase;
use FreeElephants\AltEra\DateInstantiator\DateInstantiator;
use FreeElephants\AltEra\CalendarFactory;
use FreeElephants\AltEra\Calendar\CalendarMutableInterface;

/**
 * @author samizdam
 */
class FormatterTest extends AbstractCalendarUnitTestCase
{
    private $calendar;

    private $dateInstantiator;

    protected function setUp()
    {
        $factory = new CalendarFactory();
        $config = $this->loadPhpFixture('gregorian-season-based-ru.php');
        $calendar = $factory->createFromArray($config);
        /* @var CalendarMutableInterface $calendar */
        $initialTimestamp = date_create_from_format('Y-m-d', '0001-01-01')->getTimestamp();
        $calendar->setInitialTimestamp($initialTimestamp);
        $this->calendar = $calendar;
        $this->dateInstantiator = new DateInstantiator();
        parent::setUp();
    }

    /**
     * Year 	--- 	---.
     *
     * Y 	A full numeric representation of a year, 4 digits 	Examples: 1999 or 2003
     * y 	A two digit representation of a year 	Examples: 99 or 03
     *
     * not supported now :
     * L 	Whether it's a leap year 	1 if it is a leap year, 0 otherwise.
     * o 	ISO-8601 year number. This has the same value as Y, except that if the ISO week number (W) belongs to the previous or next year, that year is used instead. (added in PHP 5.1.0) 	Examples: 1999 or 2003
     */
    public function testFormatYear()
    {
        $formatter = new Formatter();
        $date = $this->buildDate();
        $this->assertEquals('1913, 13', $formatter->format($date, 'Y, y'));
    }

    /**
     * Month 	--- 	---
     * F 	A full textual representation of a month, such as January or March 	January through December
     * m 	Numeric representation of a month, with leading zeros 	01 through 12
     * M 	A short textual representation of a month, three letters 	Jan through Dec
     * n 	Numeric representation of a month, without leading zeros 	1 through 12
     * t 	Number of days in the given month 	28 through 31.
     */
    public function testFormatMonth()
    {
        $formatter = new Formatter();
        $date = $this->buildDate('0033', 1, 1);
        $format = 'F, m, M, n, t';
        $this->assertEquals('Январь, 01, Янв, 1, 31', $formatter->format($date, $format));
    }

    private function buildDate($year = 1913, $month = 1, $day = 1)
    {
        /* @var \DateTime $date */
        $date = date_create_from_format('Y-n-j', "{$year}-{$month}-{$day}");
        $timestamp = $date->getTimestamp();

        return $this->dateInstantiator->buildDate($this->calendar, $timestamp);
    }
}
