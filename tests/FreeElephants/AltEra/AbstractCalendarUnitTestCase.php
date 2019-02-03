<?php

namespace FreeElephants\AltEra;

use PHPUnit\Framework\TestCase;

/**
 * @author samizdam
 */
abstract class AbstractCalendarUnitTestCase extends TestCase
{
    const DS = DIRECTORY_SEPARATOR;

    /**
     * Path to static input testing data.
     *
     * @var string
     */
    const FIXTURE_PATH = __DIR__.self::DS.'_fixtures'.self::DS;

    /**
     * @param string $filename
     *
     * @return string
     */
    protected function loadFixture($filename)
    {
        return file_get_contents(self::FIXTURE_PATH.$filename);
    }

    /**
     * @param string $filename
     *
     * @return array
     */
    protected function loadPhpFixture($filename)
    {
        return require self::FIXTURE_PATH.$filename;
    }
}
