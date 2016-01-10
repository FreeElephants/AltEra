<?php

namespace FreeElephants\AltEra\Configuration;

/**
 * @author samizdam
 */
interface ConfigurationFieldEnum
{
    /**
     * Key for array of seasons.
     * Used for season based configuration.
     * Top level element.
     *
     * @required for season based
     * @value array
     * @var string
     */
    const FIELD_SEASONS = 'seasons';

    /**
     * Key for array of months.
     * Used in top level for month based confgiruation
     * and in every season element.
     *
     * Top level element for month based.
     * Nested for every `season` record.
     *
     * @required
     * @value array
     * @var string
     */
    const FIELD_MONTHS = 'months';

    /**
     * Key for name of concrete calendar.
     *
     * Top level.
     *
     * @optional
     * @value string
     * @var string
     */
    const FIELD_CALENDAR_NAME = 'name';

    /**
     *
     * Used with season based configuration.
     * Must be equals with name of some existed month, provided with `season`.
     *
     * Top level.
     *
     * @optional
     * @value string
     * @var string
     */
    const FIELD_FIRST_MONTH_NAME = 'firstMonth';

    /**
     * Seconds per AltEra Calendar Day.
     * Default value is Calendar::SEC_PER_DAY: 86400(60 * 60 * 24) - equals with real day.
     *
     * Top level.
     *
     * @optional
     * @value int
     * @var string
     */
    const FIELD_SCALE = 'scale';

    /**
     * Features of calendar: leapYears or weeks.
     * @see FIELD_LEAP_YEARS and FIELD_WEEKS.
     * Top level.
     *
     * @optional
     * @value array
     * @var string
     */
    const FIELD_FEATURES = 'features';

    /**
     * Configuration of leap years calculation.
     *
     * Nested into a `features`.
     *
     * @optional
     * @value array
     * @var string
     */
    const FIELD_LEAP = 'leapYears';

}
