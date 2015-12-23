<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\Calendar\CalendarInterface;

/**
 *
 * @author samizdam
 *
 */
interface CalendarFactoryInterface
{

    /**
     *
     *
     * @param string $input
     * @return CalendarInterface
     */
    public function createFromYaml($input);

}