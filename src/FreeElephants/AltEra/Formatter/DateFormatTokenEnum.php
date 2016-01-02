<?php

namespace FreeElephants\AltEra\Formatter;

/**
 * TODO extract this enum from project?
 *
 * @author samizdam
 * @link https://php.net/date
 *
 */
interface DateFormatTokenEnum
{
    /*
     * Day representation
     */

    /**
     * Day of the month, 2 digits with leading zeros
     * @example 01 to 31
     */
    const TOKEN_DAY_OF_MONTH_ZERO = 'd';

    /**
     * A textual representation of a day, three letters
     * @example Mon through Sun
     */
    const TOKEN_DAY_TEXTUAL = 'D';

    /**
     * Day of the month without leading zeros
     * @example 1 to 31
     */
    const TOKEN_DAY_OF_MONTH = 'j';

    /**
     * A full textual representation of the day of the week
     * @example Sunday through Saturday
     */
    const TOKEN_DAY_OF_WEEK_TEXTUAL = 'l';

    /**
     * ISO-8601 numeric representation of the day of the week
     * @example 1 (for Monday) through 7 (for Sunday)
     */
    const TOKEN_DAY_OF_WEEK_NUMERIC_ISO_8601 = 'N';

    /**
     * English ordinal suffix for the day of the month, 2 characters
     * @example st, nd, rd or th. Works well with j
     */
    const TOKEN_DAY_OF_MONTH_SUFFIX_EN = 'S';

    /**
     * Numeric representation of the day of the week
     * @example 0 (for Sunday) through 6 (for Saturday)
     */
    const TOKEN_DAY_OF_WEEK_NUMERIC = 'w';

    /**
     * The day of the year (starting from 0)
     * @var 0 through 365
     */
    const TOKEN_DAY_OF_YEAR = 'z';


    /*
     * Week representation
     */

    /**
     * ISO-8601 week number of year, weeks starting on Monday (added in PHP 4.1.0)
     * @example 42 (the 42nd week in the year)
     */
    const TOKEN_WEEK_OF_YEAR_ISO_8601 = 'W';

    /*
     * Month representation
     */

    /**
     * A full textual representation of a month
     * @example January through December
     */
    const TOKEN_MONTH_TEXTUAL_FULL = 'F';

    /**
     * Numeric representation of a month, with leading zeros
     * @example 01 through 12
     */
    const TOKEN_MONTH_NUMERIC_ZERO = 'm';

    /**
     * A short textual representation of a month, three letters
     * @example Jan through Dec
     */
    const TOKEN_MONTH_TEXTUAL_SHORT = 'M';

    /**
     * Numeric representation of a month, without leading zeros
     * @example 1 through 12
     */
    const TOKEN_MONTH_NUMERIC = 'n';

    /**
     * Number of days in the given month
     * @example 28 through 31
     */
    const TOKEN_NUMBER_OF_DAYS = 't';

    /*
     * Year representation
     */

    /**
     * Whether it's a leap year
     * @example 1 if it is a leap year, 0 otherwise
     */
    const TOKEN_YEAR_IS_LEAP = 'L';

    /**
     * ISO-8601 year number.
     * This has the same value as Y, except that if the ISO week number (W) belongs to the previous or next year, that year is used instead.
     * @example Examples: 1999 or 2003
     */
    const TOKEN_YEAR_NUMERIC_ISO_8601 = 'o';

    /**
     * A full numeric representation of a year
     * @example Examples: 1999 or 2003
     */
    const TOKEN_YEAR_NUMERIC_FULL = 'Y';

    /**
     * A two digit representation of a year
     * @example Examples: 99 or 03
     */
    const TOKEN_YEAR_NUMERIC_SHORT = 'y';

// Time 	--- 	--- not supported now in AltEra
// a 	Lowercase Ante meridiem and Post meridiem 	am or pm
// A 	Uppercase Ante meridiem and Post meridiem 	AM or PM
// B 	Swatch Internet time 	000 through 999
// g 	12-hour format of an hour without leading zeros 	1 through 12
// G 	24-hour format of an hour without leading zeros 	0 through 23
// h 	12-hour format of an hour with leading zeros 	01 through 12
// H 	24-hour format of an hour with leading zeros 	00 through 23
// i 	Minutes with leading zeros 	00 to 59
// s 	Seconds, with leading zeros 	00 through 59
// u 	Microseconds (added in PHP 5.2.2). Note that date() will always generate 000000 since it takes an integer parameter, whereas DateTime::format() does support microseconds if DateTime was created with microseconds. 	Example: 654321
// Timezone 	--- 	---
// e 	Timezone identifier (added in PHP 5.1.0) 	Examples: UTC, GMT, Atlantic/Azores
// I (capital i) 	Whether or not the date is in daylight saving time 	1 if Daylight Saving Time, 0 otherwise.
// O 	Difference to Greenwich time (GMT) in hours 	Example: +0200
// P 	Difference to Greenwich time (GMT) with colon between hours and minutes (added in PHP 5.1.3) 	Example: +02:00
// T 	Timezone abbreviation 	Examples: EST, MDT ...
// Z 	Timezone offset in seconds. The offset for timezones west of UTC is always negative, and for those east of UTC is always positive. 	-43200 through 50400
// Full Date/Time 	--- 	---
// c 	ISO 8601 date (added in PHP 5) 	2004-02-12T15:19:21+00:00
// r 	» RFC 2822 formatted date 	Example: Thu, 21 Dec 2000 16:01:07 +0200
// U 	Seconds since the Unix Epoch (January 1 1970 00:00:00 GMT) 	See also time()

}