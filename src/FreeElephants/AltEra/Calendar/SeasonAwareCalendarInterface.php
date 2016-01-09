<?php

namespace FreeElephants\AltEra\Calendar;

use FreeElephants\AltEra\TimeUnit\SeasonInterface;

/**
 * TODO rename to SeasonsBasedCalendarInterface.
 *
 * @author samizdam
 */
interface SeasonAwareCalendarInterface
{
    /**
     * @return SeasonInterface[]
     */
    public function getSeasons();
}
