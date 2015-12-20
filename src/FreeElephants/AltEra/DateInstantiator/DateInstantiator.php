<?php

namespace FreeElephants\AltEra\DateInstantiator;

/**
 *
 * @author samizdam
 *
 */
class DateInstantiator implements DateInstantiatorInterface
{

    public function getDaysDiff($initialTimestamp, $actualTimestamp, $scale)
    {
        $timestampDiff = $actualTimestamp - $initialTimestamp;
        return (int) (floor($timestampDiff / $scale));
    }
}