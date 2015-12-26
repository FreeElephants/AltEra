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

    const DS = DIRECTORY_SEPARATOR;

    const FIXTURE_PATH = __DIR__ . self::DS . "_fixtures" . self::DS;

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

    /**
     *
     * @param string $filename
     * @return string
     */
    private function loadYamlFixture($filename)
    {
        return file_get_contents(self::FIXTURE_PATH . $filename);
    }

    private function loadPhpFixture($filename)
    {
        return require self::FIXTURE_PATH . $filename;
    }
}