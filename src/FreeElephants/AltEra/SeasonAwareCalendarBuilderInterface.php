<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\TimeUnit\MonthInterface;

/**
 *
 * @author samizdam
 *
 */
interface SeasonAwareCalendarBuilderInterface extends CalendarBuilderInterface
{

    /**
     *
     *
     * @param string $name
     * @param MonthInterface[] $months
     * @return self
     */
    public function addSeason($name, array $months);

}