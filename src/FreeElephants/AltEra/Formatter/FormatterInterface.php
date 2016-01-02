<?php

namespace FreeElephants\AltEra\Formatter;

use FreeElephants\AltEra\TimeUnit\DateInterface;

/**
 *
 * @author samizdam
 *
 */
interface FormatterInterface extends DateFormatTokenEnum
{

    /**
     *
     *
     * @param DateInterface $date
     * @param string $format
     * @return string
     */
    public function format(DateInterface $date, $format);
}