<?php

namespace FreeElephants\AltEra\Calendar;

use FreeElephants\AltEra\AbstractCalendarUnitTestCase;
use FreeElephants\AltEra\TimeUnit\SeasonInterface;
use FreeElephants\AltEra\Exception\ArgumentException;

/**
 * @author samizdam
 */
class SeasonAwareCalendarTest extends AbstractCalendarUnitTestCase
{
    public function testGetSeasons()
    {
        $calendar = new SeasonAwareCalendar();
        $season = $this->createMock(SeasonInterface::class);
        $calendar->addSeason($season);
        $this->assertCount(1, $calendar->getSeasons());
    }

    public function testAddSeasonArgumentException()
    {
        $calendar = new SeasonAwareCalendar();
        $season = $this->createMock(SeasonInterface::class);
        $season->method('getName')->willReturn('spring');
        $calendar->addSeason($season);
        $this->expectException(ArgumentException::class);
        $calendar->addSeason($season);
    }
}
