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
     * @param string $yamlString
     * @return CalendarInterface
     */
    public function createFromYaml($yamlString);

    /**
     *
     *
     * @param array $config
     * @return CalendarInterface
     */
    public function createFromArray(array $config);

    /**
     *
     *
     * @param string $jsonString
     * @return CalendarInterface
     */
    public function createFromJson($jsonString);

}