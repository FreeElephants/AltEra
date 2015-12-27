<?php

namespace FreeElephants\AltEra\Calendar;

use FreeElephants\AltEra\AbstractCalendarUnitTestCase;
use FreeElephants\AltEra\TimeUnit\SeasonInterface;
use FreeElephants\AltEra\Exception\ArgumentException;

/**
 *
 * @author samizdam
 *
 */
class SeasonAwareCalendarTest extends AbstractCalendarUnitTestCase
{

    public function testGetSeasons()
    {
        $calendar = new SeasonAwareCalendar();
        $season = $this->getMock(SeasonInterface::class);
        $calendar->addSeason($season);
        $this->assertCount(1, $calendar->getSeasons());
    }

    public function testAddSeasonArgumentException()
    {
        $calendar = new SeasonAwareCalendar();
        $season = $this->getMock(SeasonInterface::class);
        $calendar->addSeason($season);
        $this->setExpectedException(ArgumentException::class);
        $calendar->addSeason($season);

    }
}