<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\Calendar\SeasonAwareCalendarInterface;
use FreeElephants\AltEra\Calendar\CalendarInterface;

/**
 *
 * @author samizdam
 *
 */
class CalendarFactoryTest extends AbstractCalendarUnitTestCase
{


    public function testCreateFromYamlSeasonBasedCalendar()
    {
        $factory = new CalendarFactory();
        $input = $this->loadYamlFixture("season-based.yml");
        $this->assertInstanceOf(SeasonAwareCalendarInterface::class, $factory->createFromYaml($input));
    }

    public function testCreateFromArray()
    {
        $factory = new CalendarFactory();
        $config = $this->loadPhpFixture("gregorian-month-based-ru.php");
        $this->assertInstanceOf(CalendarInterface::class, $factory->createFromArray($config));
    }
}