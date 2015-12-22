<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\TimeUnit\SeasonInterface;
/**
 *
 * @author samizdam
 *
 */
interface SeasonAwareCalendarInterface extends CalendarInterface
{

    /**
     *
     *
     * @return SeasonInterface[]
     */
    public function getSeasons();

}