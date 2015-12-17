<?php

namespace FreeElephants\AltEra;

/**
 * Value object for Date of Calendar
 *
 * @author samizdam
 *
 */
interface DateInterface
{

    /**
     *
     *
     * @return int
     */
    public function getYear();

    /**
     *
     *
     * @return int
     */
    public function getDay();

    /**
     *
     *
     * @return MonthInterface
     */
    public function getMonth();

}