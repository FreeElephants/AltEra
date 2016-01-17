<?php

namespace FreeElephants\AltEra\Feature\LeapYear;

/**
 * @author samizdam
 */
class BaseLeapYearFeature implements LeapYearFeatureInterface
{
    private $detector;

    private $months = [];

    public function __construct(LeapYearDetectorInterface $detector)
    {
        $this->setDetector($detector);
    }

    public function getDetector()
    {
        return $this->detector;
    }

    public function setDetector(LeapYearDetectorInterface $detector)
    {
        $this->detector = $detector;
    }

    public function setMonths(array $months)
    {
        $this->months = $months;
    }

    public function getMonths()
    {
        return $this->months;
    }
}
