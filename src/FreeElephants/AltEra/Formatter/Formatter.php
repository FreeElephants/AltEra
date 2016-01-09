<?php

namespace FreeElephants\AltEra\Formatter;

use FreeElephants\AltEra\TimeUnit\DateInterface;

/**
 * @author samizdam
 */
class Formatter implements FormatterInterface
{
    public function format(DateInterface $date, $format)
    {
        $resultString = '';
        $callbackMap = $this->getReplaceCallbackMap();
        $tokens = array_keys($callbackMap);

        $prevToken = null;
        $nextToken = null;
        $formatLength = strlen($format);
        for ($i = 0; $i < $formatLength; ++$i) {
            if ($i !== 0) {
                $prevToken = $format[$i - 1];
            }
            if ($i !== $formatLength - 1) {
                $nextToken = $format[$i + 1];
            }
            $currentToken = $format[$i];

            if ($currentToken === '\\') {
                if (in_array($nextToken, $tokens, true)) {
                    // escaped token
                    $resultString .= $nextToken;
                    ++$i;
                    continue;
                } elseif ($nextToken === '\\') {
                    // backslash
                    $resultString .= '\\';
                    ++$i;
                    continue;
                }
            } elseif (in_array($currentToken, $tokens)) {
                $resultString .= $this->getTokenValue($currentToken, $date);
                continue;
            } else {
                $resultString .= $currentToken;
            }
        }

        return $resultString;
    }

    private function getTokenValue($token, DateInterface $date)
    {
        $callback = $this->getReplaceCallbackMap()[$token];

        return call_user_func($callback, $date);
    }

    private function getReplaceCallbackMap()
    {
        return [
            // Year
            self::TOKEN_YEAR_NUMERIC_FULL => function (DateInterface $date) {
                return $date->getYear();
            },
            self::TOKEN_YEAR_NUMERIC_SHORT => function (DateInterface $date) {
                $year = $date->getYear();

                return substr($year, strlen($year) - 2, 2);
            },

            // Month
            self::TOKEN_MONTH_TEXTUAL_FULL => function (DateInterface $date) {
                return $date->getMonth()->getName();
            },
            self::TOKEN_MONTH_TEXTUAL_SHORT => function (DateInterface $date) {
                $monthName = $date->getMonth()->getName();
                // TODO check that substing avilable and add to composer suggestion this extention.
                return mb_substr($monthName, 0, 3);
            },
            self::TOKEN_MONTH_NUMERIC => function (DateInterface $date) {
                $dateMonth = $date->getMonth();
                $allMonths = $date->getCalendar()->getMonths();
                $numberOfMonth = 1;
                foreach ($allMonths as $number => $month) {
                    if ($month->getName() === $dateMonth->getName()) {
                        $numberOfMonth = $number + 1;
                        break;
                    }
                }

                return $numberOfMonth;
            },
            self::TOKEN_MONTH_NUMERIC_ZERO => function (DateInterface $date) {
                $dateMonth = $date->getMonth();
                $allMonths = $date->getCalendar()->getMonths();
                $numberOfMonth = 1;
                foreach ($allMonths as $number => $month) {
                    if ($month->getName() === $dateMonth->getName()) {
                        $numberOfMonth = $number + 1;
                        break;
                    }
                }

                return str_pad($numberOfMonth, 2, '0', STR_PAD_LEFT);

            },
            self::TOKEN_NUMBER_OF_DAYS => function (DateInterface $date) {
                return $date->getMonth()->getNumberOfDays();
            },

            // Day
            self::TOKEN_DAY_OF_MONTH => function (DateInterface $date) {
                return $date->getDayOfMonth();
            },

            self::TOKEN_DAY_OF_MONTH_ZERO => function (DateInterface $date) {
                return str_pad($date->getDayOfMonth(), 2, '0', STR_PAD_LEFT);
            },
        ];
    }
}
