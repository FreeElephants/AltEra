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
        $initialTimestamp = \DateTime::createFromFormat('Y-m-d', '0001-01-01', new \DateTimeZone('UTC'))->getTimestamp();
        $calendar->setInitialTimestamp($initialTimestamp);
        $this->calendar = $calendar;
        $this->dateInstantiator = new DateInstantiator();
        parent::setUp();
    }

    public function testEscapingBehaviorEqualsNativeDate()
    {
        $formatter = new Formatter();
        $date = $this->buildDate(1970);
        $format = '(0123\4)-\Y, \y, \\\Y, \\\\\YY, \\\\';
        $nativeResult = date($format, 0);
        $this->assertEquals($nativeResult, $formatter->format($date, $format));
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
        $format = 'Y, y';
        $this->assertEquals('1913, 13', $formatter->format($date, $format));
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

    /**
     * Day	---	---
     * d	Day of the month, 2 digits with leading zeros	01 to 31
     * j	Day of the month without leading zeros	1 to 31.
     */
    public function testFormatDayOfMonth()
    {
        $this->markTestIncomplete('Fix offsets in FreeElephants\AltEra\DateInstantiator\DateInstantiator');
        $formatter = new Formatter();
        $date = $this->buildDate('0033', 1, 1);
        $format = 'd, j';
        $this->assertEquals('01, 1', $formatter->format($date, $format));
    }

    /**
     * Days and weeks
     *
     * D	A textual representation of a day, three letters	Mon through Sun
     * l (lowercase 'L')	A full textual representation of the day of the week	Sunday through Saturday
     * N	ISO-8601 numeric representation of the day of the week (added in PHP 5.1.0)	1 (for Monday) through 7 (for Sunday)
     * w	Numeric representation of the day of the week	0 (for Sunday) through 6 (for Saturday).
     *
     * not supported now :
     * S	English ordinal suffix for the day of the month, 2 characters	st, nd, rd or th. Works well with j
     */
    public function testFormatDayOfWeek()
    {
        $this->markTestIncomplete('Require Week time unit feature. ');
        $formatter = new Formatter();
        $date = $this->buildDate('0033', 1, 1);
        $format = 'D, l, N, w';
        $this->assertEquals('Cуб, Суббота, 6, 6', $formatter->format($date, $format));
    }

    private function buildDate($year = 1913, $month = 1, $day = 1)
    {
        $format = 'Y-n-j';
        $dateString = "{$year}-{$month}-{$day}";
        /* @var \DateTime $date */
        $date = \DateTime::createFromFormat($format, $dateString, new \DateTimeZone('UTC'));
        $timestamp = $date->getTimestamp();

        return $this->dateInstantiator->buildDate($this->calendar, $timestamp);
    }
}
