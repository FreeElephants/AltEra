<?php

namespace FreeElephants\AltEra\TimeUnit;

/**
 * Value object for Date of Calendar
 *
 * @author samizdam
 *
 */
interface DateInterface
{

    /**
     * Get year number for this Date.
     *
     * @return int
     */
    public function getYear();

    /**
     * Get day number for this Date.
     *
     * @return int
     */
    public function getDay();

    /**
     * Get Date Month.
     *
     * @return MonthInterface
     */
    public function getMonth();

}