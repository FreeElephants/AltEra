<?php

namespace FreeElephants\AltEra\Formatter;

use FreeElephants\AltEra\AbstractCalendarUnitTestCase;
use FreeElephants\AltEra\TimeUnit\DateInterface;
use FreeElephants\AltEra\TimeUnit\MonthInterface;

/**
 *
 * @author samizdam
 *
 */
class FormatterTest extends AbstractCalendarUnitTestCase
{

    public function testFormatWithYearOnly()
    {
        $formatter = new Formatter();
        $date = $this->getMock(DateInterface::class);
        $date->method('getYear')->willReturn(1913);
//         $date->method('getMonth')->willReturn($this->getMock(MonthInterface::class))
        $this->assertEquals('1913', $formatter->format($date, 'Y'));
    }
}