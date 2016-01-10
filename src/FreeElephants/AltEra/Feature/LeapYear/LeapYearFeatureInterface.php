<?php

namespace FreeElephants\AltEra\Feature\LeapYear;

use FreeElephants\AltEra\TimeUnit\MonthInterface;

/**
 * @author samizdam
 */
interface LeapYearFeatureInterface
{
    const DEFAUL_LEAP_YEAR_FEATURE_NAME = 'leap';

    /**
     * Name of this leap Feature.
     *
     * @return string
     */
    public function getName();

    /**
     * @param LeapYearDetectorInterface $detector
     *
     * @return return_type
     */
    public function setDetector(LeapYearDetectorInterface $detector);

    /**
     * @return LeapYearDetectorInterface
     */
    public function getDetector();

    /**
     * @return MonthInterface[]
     */
    public function getMonths();

    /**
     * @param MonthInterface[] $months
     */
    public function setMonths(array $months);
}
