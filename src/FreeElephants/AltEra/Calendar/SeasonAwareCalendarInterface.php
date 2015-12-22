<?php

namespace FreeElephants\AltEra\Calendar;

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