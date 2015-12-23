<?php

namespace FreeElephants\AltEra\Calendar;

use FreeElephants\AltEra\TimeUnit\SeasonInterface;

/**
 *
 * @author samizdam
 * @internal
 */
interface SeasonsBasedMutableCalendarInterface
{

    public function addSeason(SeasonInterface $season);
}