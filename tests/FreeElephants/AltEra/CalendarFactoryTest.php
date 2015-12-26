<?php

namespace FreeElephants\AltEra;

use FreeElephants\AltEra\Calendar\SeasonAwareCalendarInterface;

/**
 *
 * @author samizdam
 *
 */
class CalendarFactoryTest extends AbstractCalendarUnitTestCase
{

    const DS = DIRECTORY_SEPARATOR;

    public function testCreateFromYamlSeasonBasedCalendar()
    {
        $factory = new CalendarFactory();
        $input = $this->loadYamlFixture("season-based.yml");
        $this->assertInstanceOf(SeasonAwareCalendarInterface::class, $factory->createFromYaml($input));
    }

    /**
     *
     * @param string $filename
     * @return string
     */
    private function loadYamlFixture($filename)
    {
        $fixturePath = __DIR__ . self::DS . "_fixtures" . self::DS;
        return file_get_contents($fixturePath . $filename);
    }
}