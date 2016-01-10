<?php

namespace FreeElephants\AltEra\Feature\LeapYear;

/**
 * @author samizdam
 */
class JulianLeapYearDetector implements LeapYearDetectorInterface
{
    public function isLeapYear($yearNumber)
    {
        return ($yearNumber % 4) === 0;
    }
}
