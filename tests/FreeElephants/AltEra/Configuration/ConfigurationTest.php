<?php

namespace FreeElephants\AltEra\Configuration;

use FreeElephants\AltEra\AbstractCalendarUnitTestCase;
use FreeElephants\AltEra\Exception\RuntimeException;

/**
 * @author samizdam
 */
class ConfigurationTest extends AbstractCalendarUnitTestCase
{
    public function testCreateFromFile()
    {
        $config = Configuration::createFromFile('json', self::FIXTURE_PATH.'season-based.json');
        $this->assertInstanceOf(ConfigurationInterface::class, $config);
    }

    public function testOffsetSetException()
    {
        $config = new Configuration([]);
        $this->setExpectedException(RuntimeException::class);
        $config->offsetSet('foo', 'bar');
    }

    public function testOffsetUnsetException()
    {
        $config = new Configuration([]);
        $this->setExpectedException(RuntimeException::class);
        $config->offsetUnset('foo');
    }
}
