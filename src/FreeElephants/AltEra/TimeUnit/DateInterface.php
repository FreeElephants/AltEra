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
     * Get Date Year.
     *
     * @return int
     */
    public function getYear();


    /**
     * Get Date Month.
     *
     * @return MonthInterface
     */
    public function getMonth();

    /**
     * Get Date day of month.
     *
     * @return int
     */
    public function getDayOfMonth();


}