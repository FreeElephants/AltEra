<?php

namespace FreeElephants\AltEra\Formatter;

use FreeElephants\AltEra\TimeUnit\DateInterface;

/**
 *
 * @author samizdam
 *
 */
class Formatter implements FormatterInterface
{

    public function format(DateInterface $date, $format)
    {
        $resultString = $format;
        // preg_replace($pattern, $replacement, $subject)
        foreach ($this->getReplaceCallbackMap() as $token => $callback){
            $pattern = $this->buildTokenPattern($token);
            if(preg_match($pattern, $format)){
                $resultString = preg_replace($pattern, call_user_func($callback, $date), $resultString);
            }
        }

        return $resultString;
    }

    private function buildTokenPattern($token)
    {
        return '#(?<!\\\\)(' . $token . ')#';
    }

    private function getReplaceCallbackMap()
    {
        return [
            self::TOKEN_YEAR_NUMERIC_FULL => function (DateInterface $date) {
                return $date->getYear();
            },
            self::TOKEN_YEAR_NUMERIC_SHORT => function (DateInterface $date) {
                $year = $date->getYear();
                return substr($year, strlen($year), 2);
            },
            self::TOKEN_MONTH_TEXTUAL_FULL => function (DateInterface $date) {
                return $date->getMonth()->getName();
            },
            self::TOKEN_MONTH_TEXTUAL_SHORT => function (DateInterface $date) {
                $monthName = $date->getMonth()->getName();
                return substr($monthName, 0, 3);
            },
            self::TOKEN_DAY_OF_MONTH => function (DateInterface $date) {
                return $date->getDayOfMonth();
            }
        ];
    }
}