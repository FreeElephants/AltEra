<?php

namespace FreeElephants\AltEra\Feature\LeapYear;

/**
 * @author samizdam
 */
class BaseLeapYearFeature implements LeapYearFeatureInterface
{
    private $detector;

    private $name;

    private $months = [];

    public function __construct(LeapYearDetectorInterface $detector, $name = self::DEFAUL_LEAP_YEAR_FEATURE_NAME)
    {
        $this->setDetector($detector);
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
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
