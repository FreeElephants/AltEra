<?php

namespace FreeElephants\AltEra\Builder;

use FreeElephants\AltEra\TimeUnit\Season;

/**
 * Use this Builder for create Calendar with Season Unit supports,
 * Months units will be nested into its.
 *
 * @author samizdam
 *
 */
class SeasonAwareCalendarBuilder extends AbstractCalendarBuilder implements SeasonAwareCalendarBuilderInterface
{

    public function addSeason($name, array $months)
    {
        $season = new Season($name, $months);

    }

}