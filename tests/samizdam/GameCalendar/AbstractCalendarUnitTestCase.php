<?php

namespace samizdam\GameCalendar;

/**
 *
 * @author samizdam
 *
 */
abstract class AbstractCalendarUnitTestCase extends \PHPUnit_Framework_TestCase
{

    /**
     * Path to static input testing data.
     *
     * @var string
     */
    const FIXTURE_PATH = __DIR__ . DIRECTORY_SEPARATOR . '_input';
}