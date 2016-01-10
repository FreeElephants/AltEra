<?php

namespace FreeElephants\AltEra\Configuration;

use FreeElephants\Configuration\Reader\ReaderFactory;
use FreeElephants\AltEra\Exception\RuntimeException;

/**
 *
 * @author samizdam
 *
 */
class Configuration implements ConfigurationInterface
{

    private $container;

    /**
     *
     *
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->container = new \ArrayObject($array);
    }

    /**
     *
     *
     * @param string $format
     * @param string $filename
     * @return static
     */
    public static function createFromFile($format, $filename)
    {
        $readerFactory = new ReaderFactory();
        $array = $readerFactory->createReader($format)->readFile($filename);
        return new self($array);
    }

    /**
     *
     *
     * @param string $format
     * @param string $input
     * @return static
     */
    public static function createFromString($format, $input)
    {
        $readerFactory = new ReaderFactory();
        $array = $readerFactory->createReader($format)->readString($input);
        return new self($array);
    }

    public function isCalendarNameProvided()
    {
        return $this->offsetExists(self::FIELD_CALENDAR_NAME);
    }

    public function isMonthAwareConfig()
    {
        return $this->offsetExists(self::FIELD_MONTHS);
    }

    public function isSeasonAwareConfig()
    {
        return $this->offsetExists(self::FIELD_SEASONS);
    }

    public function offsetExists($fieldName)
    {
        return $this->container->offsetExists($fieldName);
    }

    public function offsetGet($fieldName)
    {
        return $this->container->offsetGet($fieldName);
    }

    public function offsetSet($offset, $value)
    {
        throw new RuntimeException('Configuration is read-only object. Do not call ' . __METHOD__);
    }

    public function offsetUnset($offset)
    {
        throw new RuntimeException('Configuration is read-only object. Do not call ' . __METHOD__);
    }
}