<?php

namespace FreeElephants\AltEra;

/**
 * Value object for Mothr of Calendar
 *
 * @author samizdam
 *
 */
interface MonthInterface
{

    /**
     *
     *
     * @return string
     */
    public function getName();

    /**
     * TODO ?
     *
     * @return int
     */
//     public function getNumberInYear();

    /**
     *
     *
     * @return int
     */
    public function getNumberOfDays();

}