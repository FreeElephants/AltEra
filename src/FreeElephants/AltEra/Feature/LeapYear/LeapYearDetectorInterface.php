<?php

namespace FreeElephants\AltEra\Feature\LeapYear;

/**
 * @author samizdam
 */
interface LeapYearDetectorInterface
{
    /**
     * @param int $yearNumber
     *
     * @return bool
     */
    public function isLeapYear($yearNumber);
}
