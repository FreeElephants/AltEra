<?php

namespace FreeElephants\AltEra\Interval;

/**
 *
 * @author samizdam
 *
 */
class IntervalCalculator implements IntervalCalculatorInterface
{

    public function getDaysDiff($initialTimestamp, $actualTimestamp, $scale)
    {
        $timestampDiff = $actualTimestamp - $initialTimestamp;
        return (int) (floor($timestampDiff / $scale));
    }
}