<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\Calendar\SeasonAwareCalendarInterface;
use FreeElephants\AltEra\Calendar\CalendarInterface;
use FreeElephants\AltEra\Exception\InvalidConfigurationException;

/**
 * @author samizdam
 */
class CalendarFactoryTest extends AbstractCalendarUnitTestCase
{
    public function testCreateFromYamlSeasonBasedCalendar()
    {
        $factory = new CalendarFactory();
        $input = $this->loadFixture('season-based.yml');
        $this->assertInstanceOf(SeasonAwareCalendarInterface::class, $factory->createFromYaml($input));
    }

    public function testCreateFromArray()
    {
        $factory = new CalendarFactory();
        $config = $this->loadPhpFixture('gregorian-month-based-ru.php');
        $this->assertInstanceOf(CalendarInterface::class, $factory->createFromArray($config));
    }

    public function testCreateFromJson()
    {
        $factory = new CalendarFactory();
        $input = $this->loadFixture('season-based.json');
        $this->assertInstanceOf(SeasonAwareCalendarInterface::class, $factory->createFromJson($input));
    }

    public function testCreateFromArrayWithMissingRequiredField()
    {
        $factory = new CalendarFactory();
        $this->setExpectedException(InvalidConfigurationException::class);
        $factory->createFromArray([]);
    }
}
