<?php

namespace FreeElephants\AltEra\TimeUnit;

/**
 * @author samizdam
 */
interface SeasonInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @return int
     */
    public function getNumberOfDays();

    /**
     * @return MonthInterface
     */
    public function getMonths();
}
