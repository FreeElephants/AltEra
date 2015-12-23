<?php

namespace FreeElephants\AltEra\Calendar;

use FreeElephants\AltEra\TimeUnit\SeasonInterface;

/**
 *
 * @author samizdam
 * @internal
 */
interface SeasonsBasedMutableCalendarInterface extends SeasonAwareCalendarInterface
{

    public function addSeason(SeasonInterface $season);
}