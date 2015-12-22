<?php

namespace FreeElephants\AltEra\TimeUnit;

/**
 *
 * @author samizdam
 *
 */
class Season implements SeasonInterface
{

    /**
     *
     * @var string
     */
    private $name;

    /**
     *
     * @var array
     */
    private $months = [];

    /**
     *
     *
     * @param string $name
     * @param MonthInterface[] $months
     */
    public function __construct($name, array $months)
    {
        $this->name = $name;
        $this->months = $months;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getMonths()
    {
        return $this->months;

    }

    public function getNumberOfDays()
    {
        // TODO extract anywhere this duplicates with Calendar
        $daysByMonths = array_map(function(MonthInterface $month){
            return $month->getNumberOfDays();
        }, $this->getMonths());

            return array_sum($daysByMonths);
    }

}