<?php

namespace FreeElephants\AltEra\Configuration;

/**
 * @author samizdam
 */
interface ConfigurationInterface extends ConfigurationFieldEnum, \ArrayAccess
{
    /**
     * @return bool
     */
    public function isSeasonAwareConfig();

    /**
     * @return bool
     */
    public function isMonthAwareConfig();

    /**
     * @return bool
     */
    public function isCalendarNameProvided();

    /**
     * @return bool
     */
    public function hasLeapFeature();
}
