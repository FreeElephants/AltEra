<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\Calendar\CalendarInterface;
use FreeElephants\AltEra\Configuration\ConfigurationInterface;

/**
 * @author samizdam
 */
interface CalendarFactoryInterface
{
    /**
     * Create Calendar instance from Yaml serialized string.
     *
     * @param string $yamlString
     *
     * @return CalendarInterface
     */
    public function createFromYaml($yamlString);

    /**
     * Create Calendar instance from PHP array config.
     *
     * @param array $config
     *
     * @return CalendarInterface
     */
    public function createFromArray(array $config);

    /**
     * Create Calendar instance from Json serialized string.
     *
     * @param string $jsonString
     *
     * @return CalendarInterface
     */
    public function createFromJson($jsonString);

    /**
     * Create Calendar instance from Configuration object.
     *
     * @param ConfigurationInterface $config
     *
     * @return CalendarInterface
     */
    public function createFromObject(ConfigurationInterface $config);
}
