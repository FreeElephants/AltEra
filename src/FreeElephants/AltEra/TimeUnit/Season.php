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
     * @var MonthInterface[]
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
        foreach ($months as $month){
            $this->addMonth($month);
        }
    }

    protected function addMonth(MonthInterface $month)
    {
        $this->months[] = $month;
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